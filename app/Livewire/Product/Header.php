<?php

namespace App\Livewire\Product;

use App\Http\Controllers\FBController;
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
        $fb = new FBController;

        return view('livewire.product.header', ['script' => $fb->ViewContent($this->product)]);
    }
}
