<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $request->input('name', 'Reza');
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

    public function inputType(Request $request): string
    {
        $name = $request->input('name');
        $married = $request->boolean('married');
        $birthDate = $request->date('birth_date', 'd-m-Y');
        $gender = $request->enum('gender', Gender::class);

        return json_encode([
            'name' => $name,
            'married' => $married,
            'birth_date' => $birthDate->format('Y-m-d'),
            'gender' => $gender->value,
        ]);
    }

    public function filterOnly(Request $request): string
    {
        $input = $request->only('name.first', 'name.last');
        return json_encode($input);
    }

    public function filterExcept(Request $request): string
    {
        $input = $request->except('admin');
        return json_encode($input);
    }

    public function inputMerge(Request $request): string
    {
        $request->merge(['admin' => false]);
        $input = $request->input();
        return json_encode($input);
    }

}
