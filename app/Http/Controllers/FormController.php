<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    public function form(Request $request): View
    {
        return view('form');
    }

    public function submitForm(Request $request): View
    {
        return view('hello', ['name' => $request->input('name') ]);
    }
}
