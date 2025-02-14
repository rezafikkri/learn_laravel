<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
    #[Test]
    public function createCookie(): void
    {
        $this->get('cookie/create')
            ->assertSeeText('Hello Cookie')
            ->assertCookie('user-id', 'rezafikkri')
            ->assertCookie('is-member', 0);
    }

    #[Test]
    public function getCookie(): void
    {
        $this->withCookies([
            'user-id' => 'rezafikkritest',
            'is-member' => 1,
        ])
            ->get('/cookie/get')
            ->assertJson([
                'userId' => 'rezafikkritest',
                'isMember' => 1,
            ]);
    }
}
