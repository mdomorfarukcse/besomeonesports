<?php

use App\Http\Controllers\Administration\Settings\AppSettingController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< App Settings Routes >==============
===============================================*/
Route::controller(AppSettingController::class)->prefix('app')->name('app.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:settings.index']);
    Route::post('/update', 'update')->name('update')->middleware(['can:settings.update']);
});