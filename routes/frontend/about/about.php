<?php

use App\Http\Controllers\Frontend\About\AboutController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< about Routes >==============
===============================================*/
Route::controller(AboutController::class)->prefix('about')->name('about.')->group(function () {
    Route::get('/', 'index')->name('index');
});