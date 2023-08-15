<?php

use App\Http\Controllers\Frontend\Testimonials\TestimonialsController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Faqs Routes >==============
===============================================*/
Route::controller(TestimonialsController::class)->prefix('testimonials')->name('testimonials.')->group(function () {
    Route::get('/', 'index')->name('index');
});