<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    #[Test]
    public function encryption(): void
    {
        $encrypted = Crypt::encryptString('Reza Sariful Fikri');
        var_dump($encrypted);

        $decrypted = Crypt::decryptString($encrypted);

        $this->assertEquals('Reza Sariful Fikri', $decrypted);
    }
}
