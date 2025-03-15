<?php

namespace App\Livewire\User;

use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        $products = \App\Models\Product::all();
        $page_title = 'Products';
        return view('livewire.user.product', compact('products', 'page_title'));
    }
}
