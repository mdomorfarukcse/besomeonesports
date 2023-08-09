<?php

namespace App\Models\Shop\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop\Product\Traits\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Relations;

    protected $cascadeDeletes = ['orders', 'images'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            // Prefix 'BSSPRODUCT' to the 'product_id' attribute
            $product->product_id = 'BSSPRODUCT' . $product->product_id;
        });
    }
}
