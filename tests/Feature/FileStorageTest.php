<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    #[Test]
    public function local(): void
    {
        $fileSystem = Storage::disk('local');
        $fileSystem->put('local.txt', 'This is test local disk'); // menulis content ke dalam sebuah file

        $this->assertEquals('This is test local disk', $fileSystem->get('local.txt'));
    }

    #[Test]
    public function public(): void
    {
        $fileSystem = Storage::disk('public');
        $fileSystem->put('public.txt', 'This is test public disk'); // menulis content ke dalam sebuah file

        $this->assertEquals('This is test public disk', $fileSystem->get('public.txt'));
    }
}
