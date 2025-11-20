<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ListProduct extends Component
{
    // Pakai layout yang sudah kita buat
    protected $layout = 'components.layouts.app';

    public function render()
    {
        return view('livewire.components.list-product', [
            'products' => Product::with('category')->get(),
            'categories' => Category::all(),
        ]);
    }
}
