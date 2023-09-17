<?php

namespace App\Http\Controllers\Administration\Shop\Product;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Shop\Product\Product;
use Illuminate\Support\Facades\File;
use App\Models\Shop\Category\Category;
use App\Models\Shop\Product\Images\ProductImage;
use App\Http\Requests\Administration\Shop\Product\ProductStoreRequest;
use App\Http\Requests\Administration\Shop\Product\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['images'])->get();
        // dd(json_decode($products->first()->colors, true));
        return view('administration.shop.product.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_id = $this->generateUniqueID();
        $categories = Category::select(['id', 'name'])->orderBy('name', 'asc')->get();
        return view('administration.shop.product.create', compact(['categories', 'product_id']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        // $colorsJson = json_encode($request->colors);
        // dd($request->all(), $colorsJson);
        try{
            DB::transaction(function() use ($request) {
                $product = new Product();

                $product->product_id = $request->product_id;
                $product->name = $request->name;
                $product->quantity = $request->quantity;
                $product->purchase_price = $request->purchase_price;
                $product->price = $request->price;
                $product->colors = json_encode($request->colors);
                $product->sizes = json_encode($request->sizes);
                $product->status = $request->status;
                $product->description = $request->description;
                $product->save();

                $product->categories()->attach($request->categories);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $imageStorePath = 'public/products/' . $product->product_id;
                
                        // Create the product image folder if it doesn't exist
                        $folderPath = storage_path($imageStorePath);
                        if (!File::exists($folderPath)) {
                            File::makeDirectory($folderPath, 0755, true);
                        }
                
                        $image->storeAs($imageStorePath, $imageName);
                
                        $product->images()->create([
                            'path' => 'products/' . $product->product_id . '/' . $imageName,
                        ]);
                    }
                }
            }, 5);

            toast('A New Product Has Been Created.', 'success');
            return redirect()->route('administration.shop.product.index');

        } catch (Exception $e){
            dd($e);
            alert('Product Creation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
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
        // dd($product);

        return  view('administration.shop.product.show', compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::select(['id', 'name'])->orderBy('name', 'asc')->get();
        return view('administration.shop.product.edit', compact(['categories', 'product']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        // $colorsJson = json_encode($request->colors);
        // dd($request->all(), $colorsJson);
        try{
            DB::transaction(function() use ($request, $product) {
                $product->name = $request->name;
                $product->quantity = $request->quantity;
                $product->purchase_price = $request->purchase_price;
                $product->price = $request->price;
                $product->colors = json_encode($request->colors);
                $product->sizes = json_encode($request->sizes);
                $product->status = $request->status;
                $product->description = $request->description;
                $product->save();
                
                $product->categories()->sync($request->categories);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $imageStorePath = 'public/products/' . $product->product_id;
                
                        // Create the product image folder if it doesn't exist
                        $folderPath = storage_path($imageStorePath);
                        if (!File::exists($folderPath)) {
                            File::makeDirectory($folderPath, 0755, true);
                        }
                        
                        $image->storeAs($imageStorePath, $imageName);
                
                        $product->images()->create([
                            'path' => 'products/' . $product->product_id . '/' . $imageName,
                        ]);
                    }
                }
            }, 5);

            toast('Product Has Been Updated.', 'success');
            return redirect()->route('administration.shop.product.show', ['product' => $product]);

        } catch (Exception $e){
            dd($e);
            alert('Product Update Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_image(ProductImage $image)
    {
        try {
            $image->delete();

            toast('Image Has Been Deleted.','success');
            return redirect()->back();
        } catch (Exception $e) {
            dd($e);
            alert('Image Deletation Failed!', 'There is some error! Please fix and try again.', 'error');
            return redirect()->back()->withInput();
        }
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
