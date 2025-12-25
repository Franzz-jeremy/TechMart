<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user login dan rolenya adalah 'user' (pelanggan)
        if (Auth::check() && Auth::user()->role == 'user') {
            return $next($request);
        }

        // Jika dia admin mencoba akses menu user, biarkan saja atau arahkan
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Silakan login terlebih dahulu.');
    }
}