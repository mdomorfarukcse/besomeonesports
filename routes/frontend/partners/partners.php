<?php

use App\Http\Controllers\Frontend\Partners\PartnersController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< partners Routes >==============
===============================================*/
Route::controller(PartnersController::class)->prefix('partners')->name('partners.')->group(function () {
    Route::get('/', 'index')->name('index');
});