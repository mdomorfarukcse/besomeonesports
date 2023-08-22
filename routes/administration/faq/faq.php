<?php

use App\Http\Controllers\Administration\Faq\FaqController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Faq Routes >==============
===============================================*/
Route::controller(FaqController::class)->prefix('faq')->name('faq.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{faq}', 'show')->name('show');
    Route::get('/edit/{faq}', 'edit')->name('edit');
    Route::post('/update/{faq}', 'update')->name('update');
    Route::get('/destroy/{faq}', 'destroy')->name('destroy');
});