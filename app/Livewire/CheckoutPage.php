<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Livewire;

class CheckoutPage extends Component
{
    public $carts;
    public $postalCode;
    public $city;
    public $uf;
    public $address;
    public $province;
    public $validCep = true;
    public $cpfChange = true;
    public $step = 0;
    public $name;
    public $email;
    public $tel;
    public $cpfCnpj;
    public $modal = false;
    public $password;
    public $login = false;
    public $modalIsOpen = false;

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function emailCheck(){
        return User::where('email', $this->email)->exists();
    }

    public function createUser(){
        $user = new User();
        $user = $user->create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->tel,
            'cpfCnpj' => $this->cpfCnpj,
            'password' => bcrypt($this->password),
        ]);

        $user->cart()->create([
            'body' => $this->carts
        ]);
        $this->loginCheck();
    }


    public function loginCheck()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            $this->step = 3;
            $this->login = false;
            $this->closeModal();
            $user = auth()->user();
            Livewire::actingAs($user);
        }else{
            $this->step = 1;
            $this->login = true;
        }

        return redirect('/checkout');
    }

    public function setStep($data)
    {
        $this->step = $data;
    }

    public function fecharModal()
    {
        $this->modal = false;
        $this->step = 1;
    }

    public function getCep()
    {

        if ($this->postalCode !== null && $this->postalCode !== "") {
            $response = (Http::get("viacep.com.br/ws/$this->postalCode/json"));
            $response = json_decode($response->body());
            if (isset($response->erro)) {
                $this->city = '';
                $this->uf = '';
                $this->address = '';
                $this->province = '';
                $this->validCep = false;
            } else {
                $this->city = $response->localidade;
                $this->uf = $response->uf;
                $this->address = $response->logradouro;
                $this->province = $response->bairro;
                $this->validCep = true;
            }
        } else {
            $this->city = '';
            $this->uf = '';
            $this->address = '';
            $this->province = '';
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

    public function mount()
    {
        $carrinhoAtual = session()->get('cart', []);

        if(Auth::check()){
            $user = auth()->user();

            if($user->cart()->exists()){
                empty($carrinhoAtual) ? $user->cart->body = $carrinhoAtual : '';
                $user->cart->save();
                $this->carts = $carrinhoAtual;
                $this->step = 3;
            }
        }else{
            $this->carts = $carrinhoAtual;
            $this->step = 0;
        }
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}
