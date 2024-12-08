<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesian;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    #[Test]
    public function dependency(): void
    {
        $foo = $this->app->make(Foo::class); // new Foo
        $foo2 = $this->app->make(Foo::class); // new Foo

        $this->assertEquals('Foo', $foo->foo());
        $this->assertEquals('Foo', $foo2->foo());
        $this->assertNotSame($foo, $foo2);
    }

    #[Test]
    public function bind(): void
    {
        // $person = $this->app->make(Person::class); // new Person() - error

        $this->app->bind(Person::class, function () {
            return new Person('Reza', 'Sariful Fikri');
        });

        $person = $this->app->make(Person::class); // closure() // new Person('Reza', 'Sariful Fikri')
        $person2 = $this->app->make(Person::class); // closure() // new Person('Reza', 'Sariful Fikri')

        $this->assertEquals('Reza', $person->firstName);
        $this->assertEquals('Sariful Fikri', $person->lastName);
        $this->assertNotSame($person, $person2);
    }

    #[Test]
    public function singleton(): void
    {
        $this->app->singleton(Person::class, function () {
            return new Person('Reza', 'Sariful Fikri');
        });

        $person = $this->app->make(Person::class); // new Person('Reza', 'Sariful Fikri') if not exist
        $person2 = $this->app->make(Person::class); // return existing

        $this->assertEquals('Reza', $person->firstName);
        $this->assertEquals('Sariful Fikri', $person->lastName);
        $this->assertSame($person, $person2);
    }

    #[Test]
    public function instances(): void
    {
        $person = new Person('Reza', 'Sariful Fikri');
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); // $person
        $person2 = $this->app->make(Person::class); // $person

        $this->assertEquals('Reza', $person1->firstName);
        $this->assertEquals('Sariful Fikri', $person1->lastName);
        $this->assertSame($person1, $person2);
    }

    #[Test]
    public function dependencyInjection(): void
    {
        $this->app->singleton(Foo::class, function () {
            return new Foo;
        });

        $this->app->singleton(Bar::class, function (Application $app) {
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        $this->assertEquals('Foo and Bar', $bar1->bar());
        $this->assertSame($bar1->getFoo(), $foo);
        $this->assertSame($bar1, $bar2);
    }

    #[Test]
    public function interfaceToImplementation(): void
    {
        // Jika ada yang minta dibikinkan object HelloService, tolong dibuatkannya dalam
        // HelloServiceIndonesian
        $this->app->singleton(HelloService::class, HelloServiceIndonesian::class);

        $helloIndo = $this->app->make(HelloService::class);

        $this->assertEquals('Hallo Reza', $helloIndo->hello('Reza'));
    }
}
