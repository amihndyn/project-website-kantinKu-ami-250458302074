<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class PopularMenu extends Component
{
    public $populars, $categories;

    public function mount() {
        $this->populars = Product::withCount('likes')->orderBy('likes_count', 'desc')->limit(7)->get()->all();
        $this->categories = Category::get()->all();
    }

    public function render()
    {
        return view('livewire.components.popular-menu');
    }
}
