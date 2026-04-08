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
        // 🔥 SI NO ESTÁ LOGUEADO → LOGIN
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 🔥 SI ES ADMIN → OK
        if (auth()->user()->role === 'admin') {
            return $next($request);
        }

        // 🔥 SI ES CLIENTE → LO SACAS DEL ADMIN
        return redirect()->route('cliente.bienvenida');
    }
}