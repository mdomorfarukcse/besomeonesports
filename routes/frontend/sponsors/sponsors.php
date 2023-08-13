<?php

use App\Http\Controllers\Frontend\Sponsors\SponsorsController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Sponsors Routes >==============
===============================================*/
Route::controller(SponsorsController::class)->prefix('sponsors')->name('sponsors.')->group(function () {
    Route::get('/', 'index')->name('index');
});