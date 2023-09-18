<?php

use App\Http\Controllers\Frontend\Review\ReviewController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Review Routes >==============
===============================================*/
Route::controller(ReviewController::class)->prefix('review')->name('review.')->group(function () {
    Route::get('/', 'index')->name('index');
});