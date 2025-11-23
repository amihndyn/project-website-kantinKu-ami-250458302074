<?php
// app/Livewire/Components/ProductDetail.php

namespace App\Livewire\Components;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $activeTab = 'comments';
    
    public function mount($productId)
    {
        $this->product = Product::with(['category'])->findOrFail($productId);
    }
    
    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }
    
    public function render()
    {
        return view('livewire.components.product-detail');
    }
}