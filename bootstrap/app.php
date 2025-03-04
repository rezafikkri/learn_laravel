<?php

use App\Exceptions\ValidationException;
use App\Http\Middleware\ExampleMiddleware;
use App\Http\Middleware\Test1Middleware;
use App\Http\Middleware\Test2Middleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'example' => ExampleMiddleware::class,
        ]);
        // $middleware->append(Test2Middleware::class);
        // $middleware->append(Test1Middleware::class);

        $middleware->appendToGroup('rf', [
            ExampleMiddleware::class.':RF,401',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->dontReport([
            ValidationException::class,
        ]);
        $exceptions->report(function (Throwable $e) {
            var_dump($e);
        });
        $exceptions->render(function (ValidationException $e, Request $request) {
            return response('Bad Request', 400);
        });
    })->create();
