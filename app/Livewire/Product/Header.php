<?php

namespace App\Livewire\Product;

use Livewire\Component;

class Header extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.product.header');
    }
}
