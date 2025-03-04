<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put('name', 'Reza');
        $request->session()->put('isMember', true);
        return 'ok';
    }

    public function getSession(Request $request): string
    {
        $name = $request->session()->get('name', 'Guest');
        $isMember = $request->session()->get('isMember', 'false');

        return "Name: $name, Is member: $isMember";
    }
}
