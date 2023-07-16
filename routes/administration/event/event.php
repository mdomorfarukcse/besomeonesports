<?php

use App\Http\Controllers\Administration\Event\EventController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Event Routes >==============
===============================================*/
Route::controller(EventController::class)->prefix('event')->name('event.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
});