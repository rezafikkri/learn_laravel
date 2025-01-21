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

    #[Test]
    public function routeParameter(): void
    {
        $this->get('/product/12345fg/edit')
            ->assertSeeText('Product 12345fg');

        $this->get('/product/12345fg/item/fg456')
            ->assertSeeText('Product 12345fg, Item fg456');
    }

    #[Test]
    public function routeParameterWithRegex(): void
    {
        $this->get('/categories/12345')
            ->assertSeeText('Category 12345');

        $this->get('/categories/-123')
            ->assertSeeText('404 by RezaFikkri');
    }

    #[Test]
    public function routeParameterOptional(): void
    {
        $this->get('/users')
            ->assertOk()
            ->assertSeeText('Users 404');

        $this->get('/users/123')
            ->assertOk()
            ->assertSeeText('Users 123');
    }

    #[Test]
    public function routeConflict(): void
    {
        $this->get('/conflict/reza')
            ->assertSeeText('Username only for reza');

        $this->get('/conflict/adelina')
            ->assertSeeText('Username adelina');
    }
}
