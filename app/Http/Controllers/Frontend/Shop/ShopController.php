<?php

namespace App\Http\Controllers\Frontend\Shop;

use Exception;
use Illuminate\Http\Request;
use App\Models\Shop\Order\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Shop\Product\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['images', 'categories'])->paginate(12);
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
        $size = $request->product_size ?? NULL;
        $color = $request->product_color ?? NULL;
        $quantity = $request->porduct_quantity ?? 1;

        // Calculate the total price for this item
        $price = $product->price;
        $total = $quantity * $price;

        // Create a unique identifier for this item based on product ID, color, and size
        // $itemKey = $productId.$color.$size;
        $itemKey = $productId . str_replace([' ', '-', '_', '#', '@', '!'], '', $color) . str_replace([' ', '-', '_', '#', '@', '!'], '', $size);

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


    public function show_cart() {
        $cart_items = session('cart', []);
        $subtotal = 0;

        return view('frontend.shop.cart.index', compact(['cart_items', 'subtotal']));
    }


    public function show_checkout() {
        $cart_items = session('cart', []);
        $subtotal = 0;

        return view('frontend.shop.cart.checkout', compact(['cart_items', 'subtotal']));
    }


    public function confirm_order(Request $request) {
        // dd($request, session('cart', []));

        try {
            DB::transaction(function() use ($request) {
                $order = new Order();
                $order->order_id = $this->generateUniqueID();
                $order->user_id = auth() ? auth()->user()->id : NULL; // Replace with your user identification logic
                $order->total_price = $request->sub_total; // Replace with the actual total price
                $order->name = $request->input('name');
                $order->email = $request->input('email');
                $order->address = $request->input('address');
                $order->contact_number = $request->input('contact_number');
                $order->tracking_id = rand(1, 1111); // Implement a function to generate a unique tracking ID
                $order->save();

                
                $cartItems = session('cart', []);
                foreach ($cartItems as $itemKey => $cartItem) {
                    $order->products()->attach($cartItem['product_id'], [
                        'color' => $cartItem['color'],
                        'size' => $cartItem['size'],
                        'quantity' => $cartItem['quantity'],
                        'price' => $cartItem['price'],
                        'total' => $cartItem['total'],
                    ]);
                }
            }, 5);

            // Clear the cart session data
            session()->forget('cart');

            toast('Order Has Been Placed.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }


    public function clear_cart() {
        session()->forget('cart');

        toast('The Cart Has Been Cleared.','success');
        return redirect()->route('frontend.shop.index');
    }


    public function clear_cart_item($itemKey) {
        // Retrieve the current cart items from the session
        $cartItems = session('cart', []);

        // Check if the item exists in the cart session
        if (array_key_exists($itemKey, $cartItems)) {
            // If it exists, remove it
            unset($cartItems[$itemKey]);

            // Store the updated cart items in the session
            session(['cart' => $cartItems]);
            
            toast('The Cart Item Has Been Removed.','success');
            return redirect()->back();
        }
    }

    public function update_cart(Request $request)
    {
        // Retrieve the cart items from the session
        $cartItems = session('cart', []);

        // Get the updated cart data from the form submission
        $updatedCart = $request->input('cart', []);
        // dd($cartItems, $updatedCart);

        // Loop through the updated cart data and update the session cart
        foreach ($updatedCart as $itemKey => $updatedItem) {
            if (isset($cartItems[$itemKey])) {
                $cartItems[$itemKey]['quantity'] = $updatedItem['quantity'];
                $cartItems[$itemKey]['total'] = $updatedItem['quantity'] * $cartItems[$itemKey]['price'];
            }
        }

        // Store the updated cart items in the session
        session(['cart' => $cartItems]);

        toast('The Cart Has Been Updated.','success');
        return redirect()->back();
    }



    // Generate a unique ID with a minimum and maximum length of 10 characters
    private function generateUniqueID() {
        $length = 10;
        $timestampLength = 13; // Length of the timestamp in milliseconds
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Get the current timestamp in milliseconds
        $timestamp = round(microtime(true) * 1000);
    
        // Convert the timestamp to a string and remove the decimal point
        $timestampString = str_replace('.', '', (string)$timestamp);
    
        // Calculate the number of characters needed to fill the remaining length
        $charactersNeeded = $length - $timestampLength;
    
        // Ensure we have enough characters to fill the length
        while (strlen($timestampString) < $charactersNeeded) {
            $randomCharacter = $characters[random_int(0, strlen($characters) - 1)];
            $timestampString .= $randomCharacter;
        }
    
        // Convert the timestamp to all capital letters
        $timestampString = strtoupper($timestampString);
    
        // Combine the timestamp with the random characters and take the first $length characters
        $uniqueID = substr($timestampString, 0, $length);
    
        return $uniqueID;
    }
}
