<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/*==============================================================
======================< Homepage Routes >=================
==============================================================*/
Route::middleware(['web'])->group(function () {
    include_once 'frontend/frontend.php';
});

/*==============================================================
======================< Administration Routes >=================
==============================================================*/
Route::middleware(['auth'])->group(function () {
    include_once 'administration/administration.php';
});
