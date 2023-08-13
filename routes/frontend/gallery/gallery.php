<?php

use App\Http\Controllers\Frontend\Gallery\GalleryController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Faqs Routes >==============
===============================================*/
Route::controller(GalleryController::class)->prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/', 'index')->name('index');
});