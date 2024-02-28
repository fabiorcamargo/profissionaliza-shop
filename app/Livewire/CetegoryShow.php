<?php

namespace App\Livewire;

use App\Models\ProductCategory;
use Livewire\Component;

class CetegoryShow extends Component
{
    public $categories;
    public function render()
    {
        $this->categories = ProductCategory::all();
        return view('livewire.cetegory-show');
    }
}
