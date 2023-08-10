<?php

namespace App\Models\Shop\Product\Images\Traits;

use App\Models\Shop\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    /**
     * Get the product that owns the image.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}