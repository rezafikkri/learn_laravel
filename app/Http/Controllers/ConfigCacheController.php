<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigCacheController extends Controller
{
    public function index(): void
    {
        var_dump(env('APP_NAME'));
    }
}
