<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FooBarServiceProviderTest extends TestCase
{
    #[Test]
    public function serviceProvider(): void
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        $this->assertSame($foo1, $foo2);

        $bar1 = $this->app->make(Bar::class);
        $bar2 =  $this->app->make(Bar::class);

        $this->assertSame($bar1, $bar2);

        $this->assertSame($foo1, $bar1->getFoo());
        $this->assertSame($foo2, $bar2->getFoo());
    }

    #[Test]
    public function propertySingletons(): void
    {
        $helloService1 = $this->app->make(HelloService::class);
        $helloService2 = $this->app->make(HelloService::class);

        $this->assertEquals('Hallo Reza', $helloService1->hello('Reza'));
        $this->assertSame($helloService1, $helloService2);
    }

    #[Test]
    public function testTrueIsTrue(): void
    {
        $this->assertTrue(true);
    }
}
