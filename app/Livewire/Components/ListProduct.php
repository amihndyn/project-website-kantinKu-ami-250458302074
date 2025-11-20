<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ListProduct extends Component
{
    public function render()
    {
        return view('livewire.components.list-product', [
            'products' => Product::with('category')->get(),
            'categories' => Category::all(),
        ]);
    }
}
