<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $key, int $status): Response
    {
        $apikey = $request->header('API-KEY');
        if ($apikey === $key) {
            return $next($request);
        } else {
            return response('Access Denied', $status);
        }
    }
}
