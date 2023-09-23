<?php

use App\Http\Controllers\Administration\UserManagement\AdminController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Ads Routes >==============
===============================================*/
Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{admin}', 'show')->name('show');
    Route::get('/edit/{admin}', 'edit')->name('edit');
    Route::post('/update/{admin}', 'update')->name('update');
    Route::get('/destroy/{admin}', 'destroy')->name('destroy');
});