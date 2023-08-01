<?php

use App\Http\Controllers\Administration\Event\EventController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Event Routes >==============
===============================================*/
Route::controller(EventController::class)->prefix('event')->name('event.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{event}', 'show')->name('show');
    Route::get('/edit/{event}', 'edit')->name('edit');
    Route::post('/update/{event}', 'update')->name('update');
    Route::get('/destroy/{event}', 'destroy')->name('destroy');
});