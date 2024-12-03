<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    #[Test]
    public function dependencyInjection(): void
    {
        $foo = new Foo;
        $bar = new Bar($foo);

        $this->assertEquals('Foo and Bar', $bar->bar());
    }
}
