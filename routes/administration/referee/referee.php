<?php

use App\Http\Controllers\Administration\Referee\RefereeController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Referee Routes >==============
===============================================*/
Route::controller(RefereeController::class)->prefix('referee')->name('referee.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:referee.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:referee.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:referee.create']);
    Route::get('/show/{referee}', 'show')->name('show')->middleware(['can:referee.show']);
    Route::get('/edit/{referee}', 'edit')->name('edit')->middleware(['can:referee.update']);
    Route::post('/update/{referee}', 'update')->name('update')->middleware(['can:referee.update']);
    Route::get('/destroy/{referee}', 'destroy')->name('destroy')->middleware(['can:referee.destroy']);
    
    
    Route::get('/request', 'request')->name('request')->middleware(['role:admin|developer']);
    Route::get('/request/show/{referee}', 'requestShow')->name('request.show')->middleware(['role:admin|developer']);
    Route::get('/request/show/{referee}/{status}', 'updateRequest')->name('request.update')->middleware(['role:admin|developer']);
});