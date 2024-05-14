<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Term\TermController;

/* ==============================================
===============< Term Routes >==============
===============================================*/
Route::controller(TermController::class)->prefix('term')->name('term.')->group(function () {
    Route::get('/', 'index')->name('index');
});