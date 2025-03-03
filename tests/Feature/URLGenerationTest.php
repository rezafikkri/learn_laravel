<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    #[Test]
    public function current(): void
    {
        $this->get('/url/current?name=reza')
            ->assertSeeText('/url/current?name=reza');
    }

    #[Test]
    public function named(): void
    {
        $this->get('/redirect/named')
            ->assertSeeText('/redirect/hello/reza/24');
    }

    #[Test]
    public function action(): void
    {
        $this->get('/url/action')
            ->assertSeeText('/form');
    }
}
