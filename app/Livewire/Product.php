<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public function render(){
        return view('livewire.products')
            ->layout('layouts.app', ['title' => 'Daftar Produk']);
    }
}

