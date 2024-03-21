<?php

namespace App\Livewire;

use App\Http\Controllers\FBController;
use App\Models\Product;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Http;
use Livewire\Component;



class CheckoutPay extends Component
{

    public $carts;
    public $postalCode;
    public $validCep = true;
    public $cpfCnpj;
    public $billingType = 2;
    public $creditCard = [];
    public $creditCardHolderInfo = [];
    public $total;
    public $statusPay = 'init';
    public $order;


    public function getCep()
    {

        //dd($this->carts, $this->billingType, $this->creditCard, $this->creditCardHolderInfo);
        if ($this->creditCardHolderInfo['postalCode'] !== null && $this->creditCardHolderInfo['postalCode'] !== "") {
            $response = (Http::get("viacep.com.br/ws/".$this->creditCardHolderInfo['postalCode']."/json"));
            $response = json_decode($response->body());
            if (isset($response->erro)) {
                $this->creditCardHolderInfo['city'] = '';
                $this->creditCardHolderInfo['uf'] = '';
                $this->creditCardHolderInfo['address'] = '';
                $this->creditCardHolderInfo['province'] = '';
                $this->validCep = false;
            } else {
                $this->creditCardHolderInfo['city'] = $response->localidade;
                $this->creditCardHolderInfo['uf'] = $response->uf;
                $this->creditCardHolderInfo['address'] = $response->logradouro;
                $this->creditCardHolderInfo['province'] = $response->bairro;
                $this->validCep = true;
            }
        } else {
            $this->creditCardHolderInfo['city'] = '';
            $this->creditCardHolderInfo['uf'] = '';
            $this->creditCardHolderInfo['address'] = '';
            $this->creditCardHolderInfo['province'] = '';
        }


    }

    public function cartAdd($data)
    {
        $novosItens = $data;
        $carrinhoAtual = session()->get('cart', []);
        foreach ($novosItens as $produtoId => $quantidade) {
            if (isset($carrinhoAtual[$produtoId])) {
                $carrinhoAtual[$produtoId] += $quantidade;
            } else {
                $carrinhoAtual[$produtoId] = $quantidade;
            }
        }
        session()->put('cart', $carrinhoAtual);
        $this->carts = $carrinhoAtual;
        $this->dispatch('cartUp');
    }

    public function cartRm($data)
    {
        $novosItens = $data;
        $carrinhoAtual = session()->get('cart', []);
        foreach ($novosItens as $produtoId => $quantidade) {
            if (isset($carrinhoAtual[$produtoId])) {
                $novaQuantidade = $carrinhoAtual[$produtoId] + $quantidade;
                // Verifica se a nova quantidade é maior que 0.
                if ($novaQuantidade > 0) {
                    $carrinhoAtual[$produtoId] = $novaQuantidade;
                } else {
                    // Se a nova quantidade for menor ou igual a 0, remove o item do carrinho.
                    unset($carrinhoAtual[$produtoId]);
                }
            }
        }

        session()->put('cart', $carrinhoAtual);
        $this->carts = $carrinhoAtual;
        $this->dispatch('cartUp');
    }

    public function totalPrice() {
        //dd($this->carts);
        $total = 0;
        foreach($this->carts as $key => $value){
            $product = Product::find($key);
            $total += $product->Price->first()->price * $value;
        }
        return $total;
    }

    public function checkoutEnd(){

        $user = auth()->user();
        $this->order = $user->orders()->create([
            'billingType_id' => $this->billingType,
            'value' => $this->totalPrice(),
            'installmentCount' => 1,
            'installmentValue' => $this->total ,
            'dueDate' => now()->format('Y-m-d'),
            'postalCode' => $this->creditCardHolderInfo['postalCode'],
            'addressNumber' => $this->creditCardHolderInfo['addressNumber'],
            'description' => 'Teste',
            'pay' => $this->creditCard
        ]);

        foreach($this->carts as $key => $value){
            $this->order->products()->create([
                'product_id' => $key,
                'amount' => $value
            ]);
        }

        $this->statusPay = 1;

        $fb = new FBController;
        $fb->Purchase($this->order);

    }

    public function getOrder(){

        if($this->order->status == "CONFIRMED"){

            $this->statusPay = 2;
            session()->forget('cart');
            $this->dispatch('cartUp');
        }else{

            $this->statusPay = 3;
        }
    }

    public function render()
    {

        return view('livewire.checkout-pay');
    }
}
