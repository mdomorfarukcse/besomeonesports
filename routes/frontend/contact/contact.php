<?php

use App\Http\Controllers\Frontend\Contact\ContactController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Contact Routes >==============
===============================================*/
Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
});