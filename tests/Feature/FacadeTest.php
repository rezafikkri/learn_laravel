<?php

namespace Tests\Feature;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    private Repository $config;

    protected function setUp(): void
    {
        parent::setUp();
        $this->config = $this->app->make('config');
    }

    #[Test]
    public function config(): void
    {
        $firstName1 = config('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');

        $this->assertEquals($firstName1, $firstName2);
    }

    #[Test]
    public function configDependency(): void
    {
        $config = $this->app->make('config');
        $firstName1 = $config->get('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');
        $firstName3 = $this->config->get('contoh.author.first');

        $this->assertEquals($firstName1, $firstName2);
        $this->assertEquals($firstName1, $firstName3);
    }

    #[Test]
    public function facadeMock(): void
    {
        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('RezaFikkri');

        $this->assertEquals('RezaFikkri', Config::get('contoh.author.first'));
    }
}
