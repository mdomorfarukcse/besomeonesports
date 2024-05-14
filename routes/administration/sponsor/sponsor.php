<?php

use App\Http\Controllers\Administration\Sponsor\SponsorController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Sponsor Routes >==============
===============================================*/
Route::controller(SponsorController::class)->prefix('sponsor')->name('sponsor.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:sponsor.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:sponsor.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:sponsor.create']);
    Route::get('/show/{sponsor}', 'show')->name('show')->middleware(['can:sponsor.show']);
    Route::get('/edit/{sponsor}', 'edit')->name('edit')->middleware(['can:sponsor.update']);
    Route::post('/update/{sponsor}', 'update')->name('update')->middleware(['can:sponsor.update']);
    Route::get('/destroy/{sponsor}', 'destroy')->name('destroy')->middleware(['can:sponsor.destroy']);
});