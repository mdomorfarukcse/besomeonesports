<?php

use App\Http\Controllers\Frontend\Privacy\PrivacyController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Privacy Routes >==============
===============================================*/
Route::controller(PrivacyController::class)->prefix('privacy')->name('privacy.')->group(function () {
    Route::get('/', 'index')->name('index');
});