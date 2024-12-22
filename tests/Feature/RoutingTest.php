<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    #[Test]
    public function routeGet(): void
    {
        $this->get('/rezafikkri')
            ->assertStatus(200)
            ->assertSeeText('RezaFikkri');
    }

    #[Test]
    public function routeRedirect(): void
    {
        $this->get('/youtube')
            ->assertRedirect('/rezafikkri');
    }

    #[Test]
    public function routeFallback(): void
    {
        $this->get('/404')
            ->assertSeeText('404 by RezaFikkri');
    }
}
