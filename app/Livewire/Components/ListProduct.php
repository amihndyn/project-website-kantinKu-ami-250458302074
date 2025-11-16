<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ListProduct extends Component
{
    public $products, $categories;

    public function mount() {
        $this->products = Product::with('category')->withCount('likes')->orderBy('likes_count', 'desc')->limit(7)->get()->all();
        $this->categories = Category::get()->all();
    }

    public function render()
    {
        return view('livewire.components.list-product');
    }
}
