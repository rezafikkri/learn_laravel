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

Route::get('/product/{id}/edit', function (string $productId) {
    return "Product $productId";
});

Route::get('/product/{product}/item/{item}', function (string $productId, string $itemId) {
    return "Product $productId, Item $itemId";
});

Route::get('/categories/{id}', function (string $categoryId) {
    return "Category $categoryId";
})->where('id', '\d+');

Route::get('/users/{id?}', function (string $userId = '404') {
    return "Users $userId";
});

Route::get('/conflict/reza', function () {
    return "Username only for reza";
});

Route::get('/conflict/{user}', function (string $name) {
    return "Username $name";
});

