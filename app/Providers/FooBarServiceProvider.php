<?php

namespace App\Providers;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesian;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        HelloService::class => HelloServiceIndonesian::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        // echo 'FooBarServiceProvider' . PHP_EOL;
        $this->app->singleton(Foo::class, function () {
            return new Foo;
        });

        $this->app->singleton(Bar::class, function (Application $app) {
            return new Bar($app->make(Foo::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [
            HelloService::class,
            Foo::class,
            Bar::class,
        ];
    }
}
