<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    #[Test]
    public function hello(): void
    {
        $this->get('/input/hello?name=Reza Sariful Fikri')
            ->assertSeeText('Hello Reza Sariful Fikri');

        $this->post('/input/hello', [
            'name' => 'Adelina',
        ])
            ->assertSeeText('Hello Adelina');
    }

    #[Test]
    public function helloFirstName(): void
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Reza',
                'last' => 'Fikkri',
            ],
        ])
            ->assertSeeText('Hello Reza');
    }

    #[Test]
    public function helloAll(): void
    {
        $this->post('/input/hello/all', [
            'name' => [
                'first' => 'Reza',
            ],
        ])
            ->assertExactJson([
                'name' => [
                    'first' => 'Reza',
                ],
            ]);
    }

    #[Test]
    public function arrayInput(): void
    {
        $this->post('/input/array', [
            'products' => [
                [
                    'name' => 'Samsung Galaxy',
                    'price' => 1200000,
                ],
                [
                    'name' => 'Oppo Reno',
                    'price' => 2000000,
                ],
            ],
        ])
            ->assertExactJson([
                'Samsung Galaxy',
                'Oppo Reno',
            ]);
    }

    #[Test]
    public function inputType(): void
    {
        $this->post('/input/type', [
            'name' => 'Reza Sariful Fikri',
            'married' => 'false',
            'birth_date' => '10-01-2001',
            'gender' => 'males',
        ])
            ->assertExactJson([
                'name' => 'Reza Sariful Fikri',
                'married' => false,
                'birth_date' => '2001-01-10',
                'gender' => 'male',
            ]);
    }
}
