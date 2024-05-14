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
    
    public function track(Request $request) {
        $this->validate($request, [
            'order_id' => 'required|exists:orders,order_id'
        ]);
        return redirect()->route('frontend.shop.order.show', ['order_id' => encrypt($request->order_id)]);
    }
}
