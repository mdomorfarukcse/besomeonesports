<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePage\HomePageController;

/* ==============================================
===============< Homepage Routes >==============
===============================================*/
Route::controller(HomePageController::class)->name('homepage.')->group(function () {
    Route::get('/', 'index')->name('index');
});