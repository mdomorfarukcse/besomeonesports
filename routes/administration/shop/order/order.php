<?php

use App\Http\Controllers\Administration\Shop\Order\OrderController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Order Routes >==============
===============================================*/
Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function () {
    Route::get('/', 'index')->name('index');
});