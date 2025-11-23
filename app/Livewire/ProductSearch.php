<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductSearch extends Component
{
    public $category_id = '';

    public function render()
    {
        // Jika ada kategori yang dipilih, filter by kategori
        if ($this->category_id) {
            $products = Product::where('category_id', $this->category_id)->get();
        } else {
            // Jika tidak, tampilkan semua produk
            $products = Product::all();
        }

        $categories = Category::all();

        return view('livewire.product-search', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}