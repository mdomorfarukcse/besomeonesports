<?php

use App\Http\Controllers\Frontend\MediaInquiries\MediaInquiriesController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Contact Routes >==============
===============================================*/
Route::controller(MediaInquiriesController::class)->prefix('media-inquiries')->name('media-inquiries.')->group(function () {
    Route::get('/', 'index')->name('index');
});