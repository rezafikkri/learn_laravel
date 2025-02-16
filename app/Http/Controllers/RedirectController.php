<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return 'Redirect to';
    }

    public function redirectFrom(): RedirectResponse
    {
        return redirect('/redirect/to');
    }

    public function redirectNamedRoute(): RedirectResponse
    {
        return redirect()->route('redirect.hello', ['age' => 24, 'name' => 'Reza']);
    }

    public function redirectHello(string $name, int $age): string
    {
        return 'Hello ' . $name . ', i am ' . $age . ' years old.';
    }

    public function redirectAction(): RedirectResponse
    {
        return redirect()->action([RedirectController::class, 'redirectHay'], ['name' => 'RezaFikkri']);
    }

    public function redirectHay(string $name): string
    {
        return "Hay $name";
    }

    public function redirectRezaFikkri(): RedirectResponse
    {
        return redirect()->away('https://rezafikkri.github.io');
    }
}
