<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    #[Test]
    public function redirectTo(): void
    {
        $this->get('/redirect/from')
            ->assertRedirect('/redirect/to');
    }

    #[Test]
    public function redirectNamedRoute(): void
    {
        $this->get('/redirect/named-route')
            ->assertRedirect('/redirect/hello/Reza/24');
    }

    #[test]
    public function redirectAction(): void
    {
        $this->get('/redirect/action')
            ->assertredirect('/redirect/hay/RezaFikkri');
    }

    #[test]
    public function redirectRezaFikkri(): void
    {
        $this->get('/redirect/rezafikkri')
            ->assertredirect('https://rezafikkri.github.io');
    }
}
