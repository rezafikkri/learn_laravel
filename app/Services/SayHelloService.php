<?php

namespace App\Services;

class SayHelloService
{
    public function hello(string $name): string
    {
        return "Hello $name";
    }
}
