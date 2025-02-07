<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request): string
    {
        $picture = $request->file('picture');
        $picture->storePublicly('pictures', 'public');
        echo $picture->getClientOriginalName();
        return "Ok: " . $picture->hashName();
    }
}
