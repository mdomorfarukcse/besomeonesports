<?php

use App\Http\Controllers\Administration\Event\EventController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Event Routes >==============
===============================================*/
Route::controller(EventController::class)->prefix('event')->name('event.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:event.index']);
    Route::get('/my', 'myEvents')->name('my')->middleware(['role:coach|player']);
    Route::get('/create', 'create')->name('create')->middleware(['can:event.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:event.create']);
    Route::get('/show/{event}', 'show')->name('show')->middleware(['can:event.show']);
    Route::get('/edit/{event}', 'edit')->name('edit')->middleware(['can:event.update']);
    Route::post('/update/{event}', 'update')->name('update')->middleware(['can:event.update']);
    Route::get('/destroy/{event}', 'destroy')->name('destroy')->middleware(['can:event.destroy']);
    
    Route::get('/registration/{event}', 'registration')->name('registration')->middleware(['can:event_registration.create']);
    Route::post('/registration/{event}/store', 'register_player')->name('registration.store')->middleware(['can:event_registration.create']);
});