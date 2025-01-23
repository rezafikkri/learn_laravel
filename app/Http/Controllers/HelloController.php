<?php

namespace App\Http\Controllers;

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
}
