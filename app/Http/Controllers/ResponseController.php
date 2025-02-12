<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return response('Hello response');
    }

    public function header(Request $request): Response
    {
        $body = ['name' => 'Reza Sariful Fikri'];
        return response(json_encode($body), 201)
            ->header('Content-Type', 'application/json')
            ->withHeaders([
                'Author' => 'RezaFikkri',
                'App' => 'Belajar Laravel',
            ]);
    }

    public function responseView(Request $request): Response
    {
        return response()
            ->view('hello', ['name' => 'Reza'], 201)
            ->header('X-Powered-By', 'RezaFikkri');
    }

    public function responseJson(Request $request): JsonResponse
    {
        $body = [
            'firstname' => 'Reza',
            'lastname' => 'Fikkri',
        ];
        return response()
            ->json($body);
    }

    public function responseFile(Request $request): BinaryFileResponse
    {
        return response()
            ->file(storage_path('app/public/pictures/1i3OMvJv5KYOvEnE7zWARXW9rdwWTpkYrIqBU6hV.png'));
    }

    public function responseDownload(Request $request): BinaryFileResponse
    {
        return response()
            ->download(
                storage_path('app/public/pictures/1i3OMvJv5KYOvEnE7zWARXW9rdwWTpkYrIqBU6hV.png'),
                'reza.png',
            );
    }
}
