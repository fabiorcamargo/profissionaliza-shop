<?php

namespace App\Livewire;

use App\Livewire\Product\Header;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\On;

class Cart extends Component
{
    public $carts;
    public $products;
    public $product;

    #[On('cartAdd')]
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

    public function mount(){
        $carrinhoAtual = session()->get('cart', []);
        $this->carts = $carrinhoAtual;
    }


    public function render()
    {
        return view('livewire.cart');
    }
}
