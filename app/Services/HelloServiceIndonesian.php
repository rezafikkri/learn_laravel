<?php

namespace App\Services;

class HelloServiceIndonesian implements HelloService
{
    public function hello(string $name): string
    {
        return "Hallo $name";
    }
}
