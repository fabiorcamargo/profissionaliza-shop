<?php

namespace App\Livewire;

use App\Http\Controllers\FBController;
use App\Jobs\CheckPay;
use App\Jobs\CheckPix;
use App\Mail\PagamentoSucesso;
use App\Models\Product;
use App\Models\UserOrder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;



class CheckoutPay extends Component
{

    public $carts;
    public $postalCode;
    public $validCep = true;
    public $cpfCnpj;
    public $billingType = 1;
    public $creditCard = [];
    public $creditCardHolderInfo = [];
    public $total;
    public $statusPay = 'init';
    public $order;


    public function getCep()
    {

        
        //dd($this->carts, $this->billingType, $this->creditCard, $this->creditCardHolderInfo);
        if (isset($this->creditCardHolderInfo['postalCode']) && $this->creditCardHolderInfo['postalCode'] !== "") {
            $response = (Http::get("viacep.com.br/ws/" . $this->creditCardHolderInfo['postalCode'] . "/json"));
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


    public function setBillingType()
    {

        //dd($this->billingType);

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

    public function totalPrice()
    {
        //dd($this->carts);
        $total = 0;
        foreach ($this->carts as $key => $value) {
            $product = Product::find($key);
            $total += $product->Price->first()->price * $value;
        }
        return $total;
    }

    public function checkoutEnd()
    {

        $user = auth()->user();

        if ($this->billingType == 1) {
            //dd('pix');

            $this->order = $user->orders()->create([
                'billingType_id' => $this->billingType,
                'value' => $this->totalPrice(),
                'dueDate' => now()->format('Y-m-d'),
                'postalCode' => $this->creditCardHolderInfo['postalCode'],
                'addressNumber' => $this->creditCardHolderInfo['addressNumber'],
                'description' => 'Teste',
            ]);
        } else if ($this->billingType == 2) {
            //dd('cartão');
            $this->order = $user->orders()->create([
                'billingType_id' => $this->billingType,
                'value' => $this->totalPrice(),
                'installmentCount' => 1,
                'installmentValue' => $this->total,
                'dueDate' => now()->format('Y-m-d'),
                'postalCode' => $this->creditCardHolderInfo['postalCode'],
                'addressNumber' => $this->creditCardHolderInfo['addressNumber'],
                'description' => 'Teste',
                'pay' => $this->creditCard
            ]);
        }

        foreach ($this->carts as $key => $value) {
            $this->order->products()->create([
                'product_id' => $key,
                'amount' => $value
            ]);
        }

        $this->statusPay = 1;

        $fb = new FBController;
        $fb->Purchase($this->order);
    }

    public function getOrder()
    {

        //dd($this->order->user->email);
        if ($this->order->status == "CONFIRMED" || $this->order->status == "RECEIVED") {
            Mail::to($this->order->user->email)->send(new PagamentoSucesso($this->order));
            $this->statusPay = 2;
            session()->forget('cart');
            $this->dispatch('cartUp');
        } else if ($this->order->status == "PENDING" && $this->order->billingType_id == 1){
            dispatch(new CheckPix($this->order));
        } else if ($this->order->status == "PIX"){
            $this->statusPay = 'QRCODE';
            dispatch(new CheckPay($this->order));
        }
        
        else {

            $this->statusPay = 3;
        }
    }

    public function checkPay(){
        dispatch(new CheckPay($this->order));
    }


    public function render()
    {
        return view('livewire.checkout-pay');
    }
}
