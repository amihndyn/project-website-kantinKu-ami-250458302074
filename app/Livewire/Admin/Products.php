<?php
// app/Livewire/Admin/Products.php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Products extends Component
{
    use WithFileUploads, WithPagination;

    public $categories = [];
    public $name, $description, $price, $category_id, $image_path;
    public $editMode = false;
    public $editId = null;
    public $search = '';
    public $showModal = false;
    public $is_active = true;

    // Di app/Livewire/Admin/Products.php
    public function layout()
    {
        return 'components.layouts.app'; // Pakai layout admin khusus
    }
    public function mount()
    {
        // Check authentication dan role admin
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login')->with('error', 'Please login as admin.');
        }

        $this->categories = Category::all();
    }

    public function create()
    {
        $this->reset();
        $this->showModal = true;
        $this->editMode = false;
        $this->is_active = true;
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->editId = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->image_path = $product->image_path;
        $this->is_active = $product->is_active;
        $this->showModal = true;
        $this->editMode = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'is_active' => $this->is_active,
        ];

        // Handle image upload
        if ($this->image_path && is_object($this->image_path)) {
            $data['image_path'] = $this->image_path->store('products', 'public');
        }

        if ($this->editMode) {
            Product::find($this->editId)->update($data);
            session()->flash('success', 'Product updated successfully!');
        } else {
            Product::create($data);
            session()->flash('success', 'Product created successfully!');
        }

        $this->showModal = false;
        $this->reset();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('success', 'Product deleted successfully!');
    }

    public function render()
    {
        $products = Product::when($this->search, function($query) {
                return $query->where('name', 'like', '%'.$this->search.'%')
                           ->orWhere('description', 'like', '%'.$this->search.'%');
            })
            ->latest()
            ->paginate(12);

        return view('livewire.admin.products', compact('products'));
    }
}