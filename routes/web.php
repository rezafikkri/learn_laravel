<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rezafikkri', function () {
    return 'RezaFikkri';
});

Route::redirect('/youtube', '/rezafikkri');

Route::fallback(function () {
    return '404 by RezaFikkri';
});

Route::get('/hello', function () {
    return view('hello', [
        'name' => 'Reza Sariful Fikri',
    ]);
});

Route::get('/hello-world', function () {
    return view('hello.world', [
        'name' => 'Adelina',
    ]);
});
