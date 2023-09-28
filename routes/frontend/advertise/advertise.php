<?php

use App\Http\Controllers\Frontend\Advertise\AdvertiseController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Mission Routes >==============
===============================================*/
Route::controller(AdvertiseController::class)->prefix('advertise-with-us')->name('advertise.')->group(function () {
    Route::get('/', 'index')->name('index');
});