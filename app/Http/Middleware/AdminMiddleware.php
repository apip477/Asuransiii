<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user login DAN apakah role-nya 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Lolos
        }

        // Jika bukan admin, tendang ke dashboard biasa
        return redirect('/dashboard')->with('error', 'Akses Ditolak: Anda bukan Admin.');
    }
}
