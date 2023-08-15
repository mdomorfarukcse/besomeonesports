<?php

use App\Http\Controllers\Frontend\Faqs\FaqsController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Faqs Routes >==============
===============================================*/
Route::controller(FaqsController::class)->prefix('faqs')->name('faqs.')->group(function () {
    Route::get('/', 'index')->name('index');
});