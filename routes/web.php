<?php

use App\Http\Controllers\ConfigCacheController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/configcache', [ConfigCacheController::class, 'index']);
