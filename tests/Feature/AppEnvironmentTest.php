<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
    #[Test]
    public function appEnv(): void
    {
        if (App::environment('testing')) {
            $this->assertTrue(true);
        }
    }
}
