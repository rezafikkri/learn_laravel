<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response
    {
        return response('Hello Cookie')
            ->cookie('user-id', 'rezafikkri', 5, '/')
            ->cookie('is-member', 0, 5, '/');
    }

    public function getCookie(Request $request): JsonResponse
    {
        return response()
            ->json([
                'userId' => $request->cookie('user-id', 'guest'),
                'isMember' => $request->cookie('is-member', 1),
            ]);
    }

    public function clearCookie(Request $request): Response
    {
        return response('Clear cookie')
            ->withoutCookie('user-id')
            ->withoutCookie('is-member');
    }
}
