<?php

namespace App\Data;

class Foo implements FooInterface
{
    public function foo(): string
    {
        return 'Foo';
    }
}
