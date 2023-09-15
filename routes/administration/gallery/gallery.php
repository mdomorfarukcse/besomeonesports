<?php

use App\Http\Controllers\Administration\Gallery\GalleryController;
use Illuminate\Support\Facades\Route;

/* ==============================================
===============< Gallery Routes >==============
===============================================*/
Route::controller(GalleryController::class)->prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:gallery.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:gallery.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:gallery.create']);
    Route::get('/show/{gallery}', 'show')->name('show')->middleware(['can:gallery.show']);
    Route::get('/edit/{gallery}', 'edit')->name('edit')->middleware(['can:gallery.update']);
    Route::post('/update/{gallery}', 'update')->name('update')->middleware(['can:gallery.update']);
    Route::get('/destroy/{gallery}', 'destroy')->name('destroy')->middleware(['can:gallery.destroy']);
});