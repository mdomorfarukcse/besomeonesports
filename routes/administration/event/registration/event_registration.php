<?php

use App\Http\Controllers\Administration\Event\EventRegistrationController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Event Registration Routes >==============
===============================================*/
Route::controller(EventRegistrationController::class)->prefix('registration')->name('registration.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{event_id}', 'show')->name('show');
    Route::get('/edit/{event_registration}', 'edit')->name('edit');
    Route::post('/update/{event_registration}', 'update')->name('update');
});