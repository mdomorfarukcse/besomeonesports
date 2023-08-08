<?php

namespace App\Models\Shop\Category\Traits;

use App\Models\Shop\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{
    /**
     * The products that belong to the product.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}