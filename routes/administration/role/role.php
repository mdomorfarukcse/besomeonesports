<?php

use App\Http\Controllers\Administration\Role\RoleController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< role Routes >==============
===============================================*/
Route::controller(RoleController::class)->prefix('role')->name('role.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{role}', 'show')->name('show');
    Route::get('/edit/{role}', 'edit')->name('edit');
    Route::post('/update/{role}', 'update')->name('update');
    Route::get('/destroy/{role}', 'destroy')->name('destroy');
});