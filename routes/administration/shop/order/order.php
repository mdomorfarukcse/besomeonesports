<?php

use App\Http\Controllers\Administration\Shop\Order\OrderController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Order Routes >==============
===============================================*/
Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:shop_order.index', 'role:admin|developer']);
    Route::get('/my', 'myOrder')->name('my')->middleware(['role:player|coach|user']);
    Route::get('/show/{order}', 'show')->name('show')->middleware(['can:shop_order.show']);
    Route::get('/status/{order}/{status}', 'status')->name('status')->middleware(['can:shop_order.update']);
});