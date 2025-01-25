<?php

namespace App\Http\Controllers;

use App\Services\GoodMorningService;
use App\Services\HelloProgrammerService;
use App\Services\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function __construct(
        private HelloService $helloService,
        private HelloProgrammerService $helloProgrammerService,
    ) {

    }

    public function hello(string $name): string
    {
        return $this->helloProgrammerService->hello($name);
    }

    public function goodMorning(GoodMorningService $goodMorningService, string $name): string
    {
        return $goodMorningService->goodMorning($name);
    }

    public function request(Request $request): string
    {
        return $request->path() . PHP_EOL .
            $request->method() . PHP_EOL .
            $request->url() . PHP_EOL .
            $request->fullUrl() . PHP_EOL .
            $request->header('Accept');
    }
}
