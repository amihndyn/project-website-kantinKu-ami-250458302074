<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function likes() {
        return $this->hasMany(Like::class, 'product_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
