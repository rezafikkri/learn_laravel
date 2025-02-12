<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    #[Test]
    public function response(): void
    {
        $this->get('response/hello')
            ->assertStatus(200)
            ->assertSeeText('Hello response');
    }

    #[Test]
    public function header(): void
    {
        $this->get('response/header')
            ->assertStatus(201)
            ->assertSeeText('Reza Sariful Fikri')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'RezaFikkri')
            ->assertHeader('App', 'Belajar Laravel');
    }

    #[Test]
    public function responseView(): void
    {
        $this->get('response/type/view')
            ->assertStatus(201)
            ->assertSeeText('Hello Reza');
    }

    #[Test]
    public function responseJson(): void
    {
        $this->get('response/type/json')
            ->assertJson([
            'firstname' => 'Reza',
            'lastname' => 'Fikkri',
        ]);
    }

    #[Test]
    public function responseFile(): void
    {
        $this->get('response/type/file')
            ->assertHeader('Content-Type', 'image/png');
    }

    #[Test]
    public function responseDownload(): void
    {
        $this->get('response/type/download')
            ->assertDownload('reza.png');
    }
}
