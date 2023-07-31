<?php

use App\Http\Controllers\Administration\Coach\CoachController;
use Illuminate\Support\Facades\Route;


/* ==============================================
===============< Coach Routes >==============
===============================================*/
Route::controller(CoachController::class)->prefix('coach')->name('coach.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{coach}', 'show')->name('show');
    Route::get('/edit/{coach}', 'edit')->name('edit');
    Route::post('/update/{coach}', 'update')->name('update');
    Route::get('/destroy/{coach}', 'destroy')->name('destroy');
});