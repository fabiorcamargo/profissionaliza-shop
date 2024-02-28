<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductView extends Component
{
    public $id;
    public $product;

    public function render()
    {
        $this->product = Product::find($this->id);

        return view('livewire.product-view');
    }
}
