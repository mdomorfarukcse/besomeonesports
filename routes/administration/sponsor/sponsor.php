<?php

use App\Http\Controllers\Administration\Sponsor\SponsorController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Sponsor Routes >==============
===============================================*/
Route::controller(SponsorController::class)->prefix('sponsor')->name('sponsor.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{sponsor}', 'show')->name('show');
    Route::get('/edit/{sponsor}', 'edit')->name('edit');
    Route::post('/update/{sponsor}', 'update')->name('update');
    Route::get('/destroy/{sponsor}', 'destroy')->name('destroy');
});