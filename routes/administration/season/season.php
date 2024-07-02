<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration\Season\SeasonController;

/* ==============================================
===============< Season Routes >==============
===============================================*/
Route::controller(SeasonController::class)->prefix('season')->name('season.')->group(function () {
    Route::get('/', 'index')->name('index')->middleware(['can:season.index']);
    Route::get('/create', 'create')->name('create')->middleware(['can:season.create']);
    Route::post('/store', 'store')->name('store')->middleware(['can:season.create']);
    Route::get('/show/{season}', 'show')->name('show')->middleware(['can:season.show']);
    Route::get('/edit/{season}', 'edit')->name('edit')->middleware(['can:season.update']);
    Route::post('/update/{season}', 'update')->name('update')->middleware(['can:season.update']);
    Route::get('/destroy/{season}', 'destroy')->name('destroy')->middleware(['can:season.destroy']);

    Route::get('/export', 'export')->name('export')->middleware(['can:season.create']);
    Route::get('/import', 'import')->name('import')->middleware(['can:season.create']);
    Route::post('/import/csv', 'importCsv')->name('import.csv')->middleware(['can:season.create']);
});