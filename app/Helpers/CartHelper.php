<?php

use App\Models\Shop\Product\Product;

if (!function_exists('product_info')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function product_info($productId)
    {
        $product = Product::with(['images'])->whereId($productId)->firstOrFail();

        return $product;
    }
}
