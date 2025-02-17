<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ExampleMiddlewareTest extends TestCase
{
    #[Test]
    public function middlewareInvalid(): void
    {
        $this->get('/middleware/api')
            ->assertStatus(401)
            ->assertSeeText('Access Denied');
    }

    #[Test]
    public function middlewareValid(): void
    {
        $this->withHeader('API-KEY', 'RF')
            ->get('/middleware/api')
            ->assertStatus(200)
            ->assertSeeText('Ok');
    }

    #[Test]
    public function middlewareGroupInvalid(): void
    {
        $this->get('/middleware/group')
            ->assertStatus(401)
            ->assertSeeText('Access Denied');
    }

    #[Test]
    public function middlewareGroupValid(): void
    {
        $this->withHeader('API-KEY', 'RF')
            ->get('/middleware/group')
            ->assertStatus(200)
            ->assertSeeText('Middleware group');
    }

    #[Test]
    public function excludeMiddleware(): void
    {
        $this->get('/middleware/testtwo')
            ->assertStatus(200)
            ->assertSeeText('without middleware');
    }
}
