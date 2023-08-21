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
     * Get the product that owns the order.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    
    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The items that belong to the order.
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(OrderItem::class);
    }
}