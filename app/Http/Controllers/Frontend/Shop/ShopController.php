<?php

namespace App\Http\Controllers\Frontend\Shop;

use Exception;
use App\Models\User;
use App\Models\Ads\Ads;
use Illuminate\Http\Request;
use App\Models\Player\Player;
use App\Models\Shop\Order\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Shop\Product\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use net\authorize\api\contract\v1\OrderType;
use net\authorize\api\contract\v1\PaymentType;
use net\authorize\api\constants\ANetEnvironment;
use net\authorize\api\contract\v1\CreditCardType;
use net\authorize\api\contract\v1\CustomerDataType;
use net\authorize\api\contract\v1\NameAndAddressType;
use net\authorize\api\contract\v1\TransactionRequestType;
use App\Mail\Administration\Shop\Order\Admin\NewOrderMail;
use net\authorize\api\contract\v1\CreateTransactionRequest;
use App\Mail\Administration\Shop\Order\OrderConfirmationMail;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\controller\CreateTransactionController;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('product')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
        $products = Product::with(['images', 'categories'])->whereStatus('Active')->paginate(12);
        return view('frontend.shop.index', compact(['products','product']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $today = now()->toDateString(); 
        $bottom_ad = Ads::whereDate('startdate', '<=', $today)
                    ->whereDate('enddate', '>=', $today)
                    ->wherePosition('product')
                    ->whereStatus('Active')
                    ->inRandomOrder()
                    ->first();
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

        return  view('frontend.shop.show', compact(['product', 'products','bottom_ad']));
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
        $customerOrder = null;
        try {
            $cardNumber = $request->card_number;
            $expirationDate = $request->card_expiry;
            $cvv = $request->card_cvc;

            $customerInfo = User::whereId(auth()->user()->id)->firstOrFail();

            // dd($request->all(), $customerInfo, Session::get('cart', []));

            $invoice_number = 'BSSOI'.unique_id(11,11);

            // Remove any non-numeric characters from the card number
            $cleanedCardNumber = preg_replace('/\D/', '', $cardNumber);

            $merchantAuthentication = new MerchantAuthenticationType();
            $merchantAuthentication->setName(env('AUTHORIZENET_API_LOGIN_ID'));
            $merchantAuthentication->setTransactionKey(env('AUTHORIZENET_TRANSACTION_KEY'));

            $creditCard = new CreditCardType();
            $creditCard->setCardNumber($cleanedCardNumber); // Use the cleaned card number
            $creditCard->setExpirationDate($expirationDate);
            $creditCard->setCardCode($cvv);

            $payment = new PaymentType();
            $payment->setCreditCard($creditCard);

            $transactionRequestType = new TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($request->sub_total);
            $transactionRequestType->setPayment($payment);

            // Set order information
            $description = 'New Order By '.$customerInfo->name.' For '.$request->name.'.';
            $order = new OrderType();
            $order->setInvoiceNumber($invoice_number);
            $order->setDescription($description);
            $transactionRequestType->setOrder($order);

            // Set customer information
            $customerData = new CustomerDataType();
            $customerData->setId('Customer ID: '.$customerInfo->id);
            $transactionRequestType->setCustomer($customerData);

            // Set shipping information
            $shippingInfo = new NameAndAddressType();
            $shippingInfo->setFirstName($request->name);
            $shippingInfo->setAddress($request->address);
            $transactionRequestType->setShipTo($shippingInfo);

            $tr_request = new CreateTransactionRequest();
            $tr_request->setMerchantAuthentication($merchantAuthentication);
            $tr_request->setRefId("ref" . time());
            $tr_request->setTransactionRequest($transactionRequestType);

            $controller = new CreateTransactionController($tr_request);
            $response = $controller->executeWithApiResponse(ANetEnvironment::SANDBOX);

            if ($response != null) {
                $trasactionReport = $response->getTransactionResponse();

                if ($trasactionReport != null && ($trasactionReport->getResponseCode() == "1" || $trasactionReport->getResponseCode() == "4")) {
                    // dd($response, $trasactionReport, $trasactionReport->getTransId());

                    DB::transaction(function () use ($request, &$customerOrder, $invoice_number, $trasactionReport) {
                        $customerOrder = new Order();
                        $customerOrder->order_id = unique_id(11,11);
                        $customerOrder->user_id = isset($request->user_id) ? decrypt($request->user_id) : auth()->user()->id;
                        $customerOrder->total_price = $request->sub_total;
                        $customerOrder->name = $request->input('name');
                        $customerOrder->email = $request->input('email');
                        $customerOrder->address = $request->input('address');
                        $customerOrder->contact_number = $request->input('contact_number');
                        $customerOrder->transaction_id = $trasactionReport->getTransId();
                        $customerOrder->invoice_number = $invoice_number;
                        $customerOrder->save();

                        // Send Mail to Admin about the Order
                        $admins = User::role('admin')->get();
                        foreach ($admins as $admin) {
                            // Send Mail to the admin email
                            Mail::to($admin->email)->send(new NewOrderMail($customerOrder, $admin));
                        }
                        
                        // Send Mail to Customer about the Order
                        Mail::to($customerOrder->email)->send(new OrderConfirmationMail($customerOrder));
            
                        $cartItems = Session::get('cart', []);
                        foreach ($cartItems as $itemKey => $cartItem) {
                            // Retrieve the product and check if it exists
                            $product = Product::find($cartItem['product_id']);
                            if ($product) {
                                // Check if there is enough quantity in stock
                                if ($product->quantity >= $cartItem['quantity']) {
                                    // Decrease the product quantity
                                    $product->quantity -= $cartItem['quantity'];
                                    $product->save();
            
                                    // Attach the product to the order
                                    $customerOrder->products()->attach($cartItem['product_id'], [
                                        'color' => $cartItem['color'],
                                        'size' => $cartItem['size'],
                                        'quantity' => $cartItem['quantity'],
                                        'price' => $cartItem['price'],
                                        'total' => $cartItem['total'],
                                    ]);
                                } else {
                                    // Handle the case where the product quantity is insufficient
                                    throw new Exception('Insufficient product quantity in stock.');
                                }
                            } else {
                                // Handle the case where the product does not exist
                                throw new Exception('Product not found.');
                            }
                        }
                    }, 5);
            
                    if ($customerOrder) {
                        // Clear the cart session data
                        Session::forget('cart');
            
                        toast('Order Has Been Placed.','success');
                        return redirect()->route('frontend.shop.order.show', ['order_id' => encrypt($customerOrder->order_id)]);
                    } else {
                        throw new Exception('Order not found.');
                    }
                } else {
                    dd($response, $trasactionReport);
                    alert('Payment Failed!', $response->getMessages()->getMessage()[0]->getText(), 'error');
                    return redirect()->back()->withInput();
                }
            } else {
                return "Payment failed: " . $response->getMessages()->getMessage()[0]->getText();
            }
        } catch (Exception $e) {
            alert('Failed!', $e->getMessage(), 'error');
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
}
