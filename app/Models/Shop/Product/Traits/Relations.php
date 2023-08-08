<?php

namespace App\Models\Shop\Product\Traits;

use App\Models\Shop\Category\Category;
use App\Models\Shop\Order\Order;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    /**
     * The categories that belong to the product.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
    
    /**
     * The orders that belong to the product.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}