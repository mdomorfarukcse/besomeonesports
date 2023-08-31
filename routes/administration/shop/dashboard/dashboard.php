<?php

use App\Http\Controllers\Administration\Shop\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Dashboard Routes >==============
===============================================*/
Route::controller(DashboardController::class)->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:shop_dashboard.index']);
});