<?php

use App\Http\Controllers\Administration\Partner\PartnerController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Partner Routes >==============
===============================================*/
Route::controller(PartnerController::class)->prefix('partner')->name('partner.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:partner.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:partner.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:partner.create']);
    Route::get('/show/{partner}', 'show')->name('show')->middleware(['can:partner.show']);
    Route::get('/edit/{partner}', 'edit')->name('edit')->middleware(['can:partner.update']);
    Route::post('/update/{partner}', 'update')->name('update')->middleware(['can:partner.update']);
    Route::get('/destroy/{partner}', 'destroy')->name('destroy')->middleware(['can:partner.destroy']);
});