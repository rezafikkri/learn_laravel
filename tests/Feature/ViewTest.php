<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ViewTest extends TestCase
{
    #[Test]
    public function viewHello(): void
    {
        $this->get('/hello')
            ->assertOk()
            ->assertSeeText('Hello Reza Sariful Fikri')
            ->assertSeeText('Test blade template');
    }

    #[Test]
    public function viewNested(): void
    {
        $this->get('/hello-world')
            ->assertOk()
            ->assertSeeText('World Adelina');
    }

    #[Test]
    public function viewTemplateOnly(): void
    {
        $this->view('hello', [
            'name' => 'Dian',
        ])->assertSeeText('Hello Dian');
    }
}
