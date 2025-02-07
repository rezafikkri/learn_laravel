<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    #[Test]
    public function upload(): void
    {
        $picture = UploadedFile::fake()->image('reza.png');

        $this->post('/file/upload', [
            'picture' => $picture,
        ])->assertSeeText('Ok: ' . $picture->hashName());
    }
}
