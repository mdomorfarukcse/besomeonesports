<?php

use App\Http\Controllers\Administration\Coach\CoachController;
use Illuminate\Support\Facades\Route;


/* ==============================================
===============< Coach Routes >==============
===============================================*/
Route::controller(CoachController::class)->prefix('coach')->name('coach.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:coach.index']);
    Route::get('/request', 'request')->name('request')->middleware(['role:admin|developer']);
    Route::get('/my', 'myCoaches')->name('my')->middleware(['role:player']);
    Route::get('/create', 'create')->name('create')->middleware(['can:coach.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:coach.create']);
    Route::get('/show/{coach}', 'show')->name('show')->middleware(['can:coach.show']);
    Route::get('/edit/{coach}', 'edit')->name('edit')->middleware(['can:coach.update']);
    Route::post('/update/{coach}', 'update')->name('update')->middleware(['can:coach.update']);
    Route::get('/destroy/{coach}', 'destroy')->name('destroy')->middleware(['can:coach.destroy']);
});