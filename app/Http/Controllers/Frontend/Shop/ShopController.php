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
        // Retrieve the current cart items from the session
        $cartItems = session('cart', []);

        // Get the product ID, color, size, and quantity from the request
        $productId = $product->id;
        $color = $request->input('product_size', 'N/A'); // Default to 'N/A' if not provided
        $size = $request->input('product_color', 'N/A');   // Default to 'N/A' if not provided
        $quantity = $request->input('porduct_quantity', 1); // Default quantity is 1 if not provided

        // Calculate the total price for this item
        $price = $product->price;
        $total = $quantity * $price;

        // Create a unique identifier for this item based on product ID, color, and size
        $itemKey = "$productId-$color-$size";

        // dd($cartItems);

        // Check if the key exists in the $cartItems array
        if (array_key_exists($itemKey, $cartItems)) {
            // If it does, update the quantity and total
            $cartItems[$itemKey]['quantity'] += $quantity;
            $cartItems[$itemKey]['total'] += $total;
        } else {
            // If it's not, add it to the cart
            $item = [
                'product_id' => $productId,
                'color' => $color,
                'size' => $size,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $total,
            ];
            $cartItems[$itemKey] = $item;
        }

        // Store the updated cart items in the session
        session(['cart' => $cartItems]);

        toast('The Item Has Been Added to Your Cart.','success');
        return redirect()->back();
    }
}
