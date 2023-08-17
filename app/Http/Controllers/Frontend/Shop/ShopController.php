<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['images', 'categories'])->paginate(12);;
        return view('frontend.shop.index', compact(['products']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::whereId($product->id)->with([
                            'categories' => function($categories) {
                                $categories->select(['id', 'name']);
                            },
                            'images'
                        ])
                        ->firstOrFail();

        $products = Product::whereHas('categories', function($query) use ($product) {
            $query->whereIn('categories.id', $product->categories->pluck('id'));
        })->get();                        
                        
        // dd($products);

        return  view('frontend.shop.show', compact(['product', 'products']));
    }

    /**
     * add_to_cart
     */
    public function add_to_cart(Request $request, Product $product)
    {
        dd($request->all(), $product);
    }
}
