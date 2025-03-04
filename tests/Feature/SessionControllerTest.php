<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    #[Test]
    public function createSession(): void
    {
        $this->get('/session/create')
            ->assertSeeText('ok')
            ->assertSessionHas('name', 'Reza')
            ->assertSessionHas('isMember', true);
    }

    #[Test]
    public function getSession(): void
    {
        $this->withSession([
            'name' => 'Reza',
            'isMember' => 'true',
        ])->get('/session/get')
            ->assertSeeText('Name: Reza, Is member: true');
    }

    #[Test]
    public function getSessionFailed(): void
    {
        $this->withSession([])->get('/session/get')
            ->assertSeeText('Name: Guest, Is member: false');

    }
}
