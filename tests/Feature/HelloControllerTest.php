<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    #[Test]
    public function hello(): void
    {
        $this->get('/controller/hello/Reza Sariful Fikri')
            ->assertOk()
            ->assertSeeText('Hello Reza Sariful Fikri am a Programmer');
    }

    #[Test]
    public function request(): void
    {
        $this->get('/request', [
            'Accept' => 'plain/text'
        ])
            ->assertSeeText('/request')
            ->assertSeeText('http://localhost/request')
            ->assertSeeText('GET')
            ->assertSeeText('plain/text');
    }
}
