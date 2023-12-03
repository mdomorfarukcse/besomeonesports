<?php

use App\Http\Controllers\Administration\Settings\AppSettingController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< App Settings Routes >==============
===============================================*/
Route::controller(AppSettingController::class)->prefix('app')->name('app.')->group(function () {
    Route::get('/', 'apiIndex')->name('index');
});