<?php

use App\Http\Controllers\Administration\Permission\PermissionController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Permission Routes >==============
===============================================*/
Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{permission}', 'show')->name('show');
    Route::get('/edit/{permission}', 'edit')->name('edit');
    Route::post('/update/{permission}', 'update')->name('update');
    Route::get('/destroy/{permission}', 'destroy')->name('destroy');

    Route::get('/import', 'import')->name('import');
    Route::get('/export', 'export')->name('export');
    Route::post('/import_permission', 'import_permission')->name('import_permission');
}); 