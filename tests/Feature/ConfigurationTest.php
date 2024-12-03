<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    #[Test]
    public function config(): void
    {
        $authorFirst = config('contoh.author.first');
        $email = config('contoh.email');

        $this->assertEquals('Reza', $authorFirst);
        $this->assertEquals('fikkri.reza@gmail.com', $email);
    }
}
