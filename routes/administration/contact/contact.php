<?php

use App\Http\Controllers\Administration\Contact\ContactController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Contact Routes >==============
===============================================*/
Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:contact.index']);
    Route::get('/show/{contact}', 'show')->name('show')->middleware(['can:contact.show']);
    Route::get('/destroy/{contact}', 'destroy')->name('destroy')->middleware(['can:contact.destroy']);
});