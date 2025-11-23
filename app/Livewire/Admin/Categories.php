<?php
// app/Livewire/Admin/Categories.php

namespace App\Livewire\Admin;

use Livewire\Component;

class Categories extends Component
{
    // 🔥 SET LAYOUT YANG SAMA
    public function layout()
    {
        return 'layouts.app';
    }

    public function render()
    {
        return view('livewire.admin.categories');
    }
}