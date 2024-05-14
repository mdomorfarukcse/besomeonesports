<?php

use App\Http\Controllers\Administration\Chat\ChatController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Chat Routes >==============
===============================================*/
Route::controller(ChatController::class)->prefix('chat')->name('chat.')->group(function () {
    Route::get('/', 'apiIndex')->name('index');
    Route::get('/show/{team}', 'apiShow')->name('show');
    Route::post('/store', 'apiStore')->name('store');
    Route::post('/imageupload', 'apiImageupload')->name('imageupload');
});