<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class NavCustom extends Component
{

    public $sum_cart;

    #[On('cartUp')]
    public function atualiza(){
        $carrinhoAtual = session()->get('cart', []);
        $this->sum_cart = array_sum($carrinhoAtual);
    }

    public function mount(){
        $carrinhoAtual = session()->get('cart', []);
        $this->sum_cart = array_sum($carrinhoAtual);
    }



    public function render()
    {
        return view('livewire.nav-custom');
    }
}
