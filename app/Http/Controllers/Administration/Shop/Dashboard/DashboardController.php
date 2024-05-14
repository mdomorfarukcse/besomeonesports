<?php

namespace App\Http\Controllers\Administration\Shop\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Shop\Order\Order;
use App\Http\Controllers\Controller;
use App\Models\Shop\Category\Category;
use App\Models\Shop\Product\Product;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the current date
        $currentDate = Carbon::today();
        
        $dashboard = [
            'total_orders' => Order::count(),
            'today_orders' => Order::whereDate('created_at', $currentDate)->count(),
            'total_sale' => Order::sum('total_price'),
            'today_sale' => Order::whereDate('created_at', $currentDate)->sum('total_price'),
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
        ];

        // dd($dashboard);
        return view('administration.shop.dashboard.index', compact(['dashboard']));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
