<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Product extends Component
{
    public function render(){
        return view('livewire.products')->layout('layouts.app', ['title' => 'Daftar Produk']);
    }
}

