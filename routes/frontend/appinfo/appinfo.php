<?php

use App\Http\Controllers\Frontend\Appinfo\AppinfoController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Faqs Routes >==============
===============================================*/
Route::controller(AppinfoController::class)->prefix('app-info')->name('appinfo.')->group(function () {
    Route::get('/', 'index')->name('index');
});