<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Sport\SportController;

/* ==============================================
===============< Sport Routes >==============
===============================================*/
Route::controller(SportController::class)->prefix('sport')->name('sport.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:sport.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:sport.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:sport.create']);
    Route::get('/show/{sport}', 'show')->name('show')->middleware(['can:sport.show']);
    Route::get('/edit/{sport}', 'edit')->name('edit')->middleware(['can:sport.update']);
    Route::post('/update/{sport}', 'update')->name('update')->middleware(['can:sport.update']);
    Route::get('/destroy/{sport}', 'destroy')->name('destroy')->middleware(['can:sport.destroy']);

    Route::get('/export', 'export')->name('export')->middleware(['can:sport.create']);
});