<?php

namespace App\Models\Shop\Order\Item\Traits;

use App\Models\Shop\Order\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    /**
     * Get the order that owns the item.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}