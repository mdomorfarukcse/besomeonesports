<?php

use App\Http\Controllers\Frontend\Shop\OrderController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Order Routes >==============
===============================================*/
Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function () {
    Route::get('/track/{order_id?}', 'show')->name('show');
});