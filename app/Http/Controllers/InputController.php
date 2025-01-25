<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $request->input('name');
        return "Hello $name";
    }

    public function helloFirstName(Request $request): string
    {
        $firstName = $request->input('name.first');
        return "Hello $firstName";
    }

    public function helloAllInput(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function arrayInput(Request $request): string
    {
        $input = $request->input('products.*.name');
        return json_encode($input);
    }

    public function dynamicProperty(Request $request): string
    {
        $request->name = 'Ini adalah name';
        $name = $request->name; // ini tidak akan mengambil lagi dari input yang kita kirim
        return $name;
    }
}
