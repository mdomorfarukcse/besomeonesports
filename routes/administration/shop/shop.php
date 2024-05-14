<?php

use Illuminate\Support\Facades\Route;

/* ==============================================
============< shop Routes >============
===============================================*/
Route::prefix('shop')
        ->name('shop.')
        ->group(function () {
            // dashboard
            include_once 'dashboard/dashboard.php';

            // order
            include_once 'order/order.php';
            
            // Product
            include_once 'product/product.php';
            
            // category
            include_once 'category/category.php';
        });