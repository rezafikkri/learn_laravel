<?php

namespace App\Services;

class HelloProgrammerService
{
    public function __construct(
        private SayHelloService $sayHelloService,
    ) {

    }

    public function hello(string $name): string
    {
        return $this->sayHelloService->hello($name) . ' am a Programmer';
    }
}
