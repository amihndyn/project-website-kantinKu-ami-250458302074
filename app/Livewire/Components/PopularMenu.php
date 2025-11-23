<?php
// app/Livewire/Components/PopularMenu.php

namespace App\Livewire\Components;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class PopularMenu extends Component
{
    public $populars;
    public $categories;
    public $selectedProduct = null;
    public $showPaymentModal = false;

    public function mount()
    {
        $this->populars = Product::inRandomOrder()->limit(8)->get(); // Ambil 8 produk random
        $this->categories = Category::all();
    }

    public function openDetail($productId)
    {
        $this->selectedProduct = Product::with('category')->find($productId);
    }

    public function closeDetail()
    {
        $this->selectedProduct = null;
        $this->showPaymentModal = false;
    }

    public function showPayment()
    {
        $this->showPaymentModal = true;
    }

    public function hidePayment()
    {
        $this->showPaymentModal = false;
    }

    public function render()
    {
        return view('livewire.components.popular-menu');
    }
}