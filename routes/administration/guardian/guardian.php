<?php

use App\Http\Controllers\Administration\Guardian\GuardianController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< guardian Routes >==============
===============================================*/
Route::controller(GuardianController::class)->prefix('guardian')->name('guardian.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:guardian.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:guardian.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:guardian.create']);
    Route::get('/show/{guardian}', 'show')->name('show')->middleware(['can:guardian.show']);
    Route::get('/edit/{guardian}', 'edit')->name('edit')->middleware(['can:guardian.update']);
    Route::post('/update/{guardian}', 'update')->name('update')->middleware(['can:guardian.update']);
    Route::get('/destroy/{guardian}', 'destroy')->name('destroy')->middleware(['can:guardian.destroy']);
});