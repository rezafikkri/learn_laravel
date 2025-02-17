<?php

use App\Http\Middleware\ExampleMiddleware;
use App\Http\Middleware\Test1Middleware;
use App\Http\Middleware\Test2Middleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(remove: [
            Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
        ]);
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
        //
    })->create();
