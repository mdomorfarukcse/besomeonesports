<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Privacy\PrivacyController;

/* ==============================================
===============< Homepage Routes >==============
===============================================*/
Route::controller(PrivacyController::class)->name('privacypolicy.')->group(function () {
    Route::get('/', 'index')->name('index');
});