<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    #[Test]
    public function environment(): void
    {
        $youtube = env('YOUTUBE');

        $this->assertEquals('Reza Sariful Fikri', $youtube);
    }

    #[Test]
    public function defaultValue(): void
    {
        $author = env('AUTHOR', 'RezaFikkri');

        $this->assertSame('RezaFikkri', $author);
    }
}
