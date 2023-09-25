<?php

namespace App\Http\Controllers\Administration\Shop\Order;

use Exception;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\Models\Shop\Order\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['products', 'user'])->orderBy('created_at', 'desc')->get();
        return view('administration.shop.order.index', compact(['orders']));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function myOrder()
    {
        $orders = Order::with(['products', 'user'])->whereUserId(Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('administration.shop.order.my', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('administration.shop.order.show', compact(['order']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Change Status
     */
    public function status(Order $order, $status)
    {
        try {
            // Validate the status
            $validStatuses = ['Active', 'Running', 'Delivery', 'Completed', 'Canceled'];
            if (!in_array($status, $validStatuses)) {
                throw new InvalidArgumentException('Invalid status provided.');
            }
            
            $order->status = $status;
            $order->save();

            toast('Status Has Been Changed To '.$status,'success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Status Updating Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }
}
