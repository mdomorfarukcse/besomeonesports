<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($order_id = null) {
        if (!is_null($order_id)) {
            $orderID = decrypt($order_id);
            $order = Order::whereOrderId($orderID)->firstOrFail();
        } else {
            $order = NULL;
        }

        return view('frontend.shop.order.show', compact(['order']));
    }
}
