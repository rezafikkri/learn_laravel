<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionCookieEnryptionController extends Controller
{
    public function sessionEncrypt(Request $request)
    {
        // session(['name' => 'Reza Sariful Fikri']);
        var_dump($request->session()->all());
    }
}
