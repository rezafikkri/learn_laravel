<?php

use App\Exceptions\ValidationException;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionCookieEnryptionController;
use App\Http\Middleware\ExampleMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
})->name('product.edit');

Route::get('/product/{product}/item/{item}', function (string $productId, string $itemId) {
    return "Product $productId, Item $itemId";
})->name('product.item.detail');

Route::get('/categories/{id}', function (string $categoryId) {
    return "Category $categoryId";
})->where('id', '\d+')->name('category.detail');

Route::get('/users/{id?}', function (string $userId = '404') {
    return "Users $userId";
})->name('user.detail');

Route::get('/conflict/reza', function () {
    return "Username only for reza";
});

Route::get('/conflict/{user}', function (string $name) {
    return "Username $name";
});

Route::get('/produk/{id}/ubah', function (string $id) {
    $url = route('product.edit', ['id' => $id]);

    return "URL: $url";
});

Route::get('/produk/{product}/item/{item}', function (string $id, string $item) {
    $url = route('product.item.detail', ['item' => $id, 'product' => $item]);

    return "URL: $url";
});

Route::get('/produk/{id}/redirect', function (string $id) {
    return redirect()->route('product.edit', [ $id ]);
});

Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);
Route::get('/good-morning/{name}', [HelloController::class, 'goodMorning']);
Route::get('/request', [HelloController::class, 'request']);

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello/first', [InputController::class, 'helloFirstName']);
Route::post('/input/hello/all', [InputController::class, 'helloAllInput']);
Route::post('/input/array', [InputController::class, 'arrayInput']);
Route::post('/input/dynamic', [InputController::class, 'dynamicProperty']);
Route::post('/input/type', [InputController::class, 'inputType']);
Route::post('/input/filter-only', [InputController::class, 'filterOnly']);
Route::post('/input/filter-except', [InputController::class, 'filterExcept']);
Route::post('/input/merge', [InputController::class, 'inputMerge']);

Route::post('/file/upload', [FileController::class, 'upload']);

Route::get('/response/hello', [ResponseController::class, 'response']);
Route::get('/response/header', [ResponseController::class, 'header']);

Route::prefix('/response/type')->group(function () {
    Route::get('view', [ResponseController::class, 'responseView']);
    Route::get('json', [ResponseController::class, 'responseJson']);
    Route::get('file', [ResponseController::class, 'responseFile']);
    Route::get('download', [ResponseController::class, 'responseDownload']);
});

Route::get('/session/encrypt', [SessionCookieEnryptionController::class, 'sessionEncrypt']);

Route::controller(CookieController::class)->group(function () {
    Route::get('/cookie/create', 'createCookie');
    Route::get('/cookie/get', 'getCookie');
    Route::get('/cookie/clear', 'clearCookie');
});

Route::get('/redirect/from', [RedirectController::class, 'redirectFrom']);
Route::get('/redirect/to', [RedirectController::class, 'redirectTo']);
Route::get('/redirect/hello/{name}/{age}', [RedirectController::class, 'redirectHello'])
    ->name('redirect.hello');
Route::get('/redirect/named', function () {
    return route('redirect.hello', ['reza', 24]);
});

Route::get('/redirect/named-route', [RedirectController::class, 'redirectNamedRoute']);
Route::get('/redirect/action', [RedirectController::class, 'redirectAction']);
Route::get('/redirect/hay/{name}', [RedirectController::class, 'redirectHay']);
Route::get('/redirect/rezafikkri', [RedirectController::class, 'redirectRezaFikkri']);

Route::middleware([ExampleMiddleware::class.':RF,401'])->prefix('middleware')->group(function () {
    Route::get('api', function () {
        return 'Ok';
    });

    Route::get('testtwo', function () {
        return 'without middleware';
    })->withoutMiddleware([ExampleMiddleware::class.':RF,401']);
});

Route::get('/middleware/testforprependappend', function () {
    return 'Test prepend append global middleware';
});

Route::get('/middleware/group', function () {
    return 'Middleware group';
})->middleware('rf');

Route::get('/url/action', function () {
    return action([FormController::class, 'form']);
});

Route::get('/form', [FormController::class, 'form']);
Route::post('/form', [FormController::class, 'submitForm']);

Route::get('/url/current', function () {
    return URL::full();
});

Route::get('/session/create', [SessionController::class, 'createSession']);
Route::get('/session/get', [SessionController::class, 'getSession']);

Route::get('/error/sample', function () {
    return throw new Exception('Sample Error');
});
Route::get('/error/manual', function () {
    report(new Exception('Manual error'));
    return 'Ok';
});
Route::get('/error/validation', function () {
    throw new ValidationException('Validation Error');
});

Route::get('/abort/400', function () {
    abort(400, 'Ups Validation Error');
});
Route::get('/abort/401', function () {
    abort(401);
});
Route::get('/abort/500', function () {
    abort(500);
});
