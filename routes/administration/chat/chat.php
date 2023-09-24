<?php

use App\Http\Controllers\Administration\Chat\ChatController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Chat Routes >==============
===============================================*/
Route::controller(ChatController::class)->prefix('chat')->name('chat.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{team}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
    Route::post('/imageupload', 'imageupload')->name('imageupload');
});