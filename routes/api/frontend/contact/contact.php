<?php

use App\Http\Controllers\Frontend\Contact\ContactController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Contact Routes >==============
===============================================*/
Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
    Route::post('/store', 'apiStore')->name('store');
});