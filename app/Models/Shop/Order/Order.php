<?php

namespace App\Models\Shop\Order;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop\Order\Traits\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes, Relations;

    protected $cascadeDeletes = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // Prefix 'BSSORDER' to the 'order_id' attribute
            $order->order_id = 'BSSORDER' . $order->order_id;
        });
    }
}
