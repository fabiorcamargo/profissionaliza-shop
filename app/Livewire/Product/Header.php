<?php

namespace App\Livewire\Product;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\On;

class Header extends Component
{
    public $product;
    public $cart;

    public function cartAdd()
    {
        $key = $this->product->id;
        $this->dispatch('cartAdd', [$key => 1]);
    }

    public function render()
    {
        return view('livewire.product.header');
    }
}
