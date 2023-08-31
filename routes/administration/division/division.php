<?php

use App\Http\Controllers\Administration\Division\DivisionController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Division Routes >==============
===============================================*/
Route::controller(DivisionController::class)->prefix('division')->name('division.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:division.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:division.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:division.create']);
    Route::get('/show/{division}', 'show')->name('show')->middleware(['can:division.show']);
    Route::get('/edit/{division}', 'edit')->name('edit')->middleware(['can:division.update']);
    Route::post('/update/{division}', 'update')->name('update')->middleware(['can:division.update']);
    Route::get('/destroy/{division}', 'destroy')->name('destroy')->middleware(['can:division.destroy']);
});