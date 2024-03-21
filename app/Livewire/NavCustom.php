<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class NavCustom extends Component
{

    public $sum_cart;


    #[On('cartUp')]
    public function atualiza(){
        $carrinhoAtual = session()->get('cart', []);
        $this->sum_cart = array_sum($carrinhoAtual);
        if(Auth::check()){
            $user = auth()->user();
            if(null !== $user->cart){
                $user->cart->body = $carrinhoAtual;
                $user->cart->save();
            }
        }
    }

    public function mount(){
        //session()->flush();
        $carrinhoAtual = session()->get('cart', []);
        //dd($carrinhoAtual);
        if(Auth::check()){
            $user = auth()->user();
            $user->cart()->exists() ? $this->sum_cart = array_sum($user->cart->body) : $this->sum_cart = array_sum($carrinhoAtual);
        }else{
            $this->sum_cart = array_sum($carrinhoAtual);
        }
    }



    public function render()
    {
        return view('livewire.nav-custom');
    }
}
