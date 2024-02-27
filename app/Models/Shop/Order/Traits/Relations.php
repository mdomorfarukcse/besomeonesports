<?php

namespace App\Models\Shop\Order\Traits;

use App\Models\Shop\Order\Item\OrderItem;
use App\Models\User;
use App\Models\Shop\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Relations
{    
    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The products that belong to the order.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['color', 'size', 'quantity', 'price', 'total', 'note']);
    }
}