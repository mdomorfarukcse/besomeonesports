<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Video\VideoController;

/* ==============================================
===============< Video Routes >==============
===============================================*/
Route::controller(VideoController::class)->prefix('video')->name('video.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:video.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:video.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:video.create']);
    Route::get('/show/{video}', 'show')->name('show')->middleware(['can:video.show']);
    Route::get('/edit/{video}', 'edit')->name('edit')->middleware(['can:video.update']);
    Route::post('/update/{video}', 'update')->name('update')->middleware(['can:video.update']);
    Route::get('/destroy/{video}', 'destroy')->name('destroy')->middleware(['can:video.destroy']);
});