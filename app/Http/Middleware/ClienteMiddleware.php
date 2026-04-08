<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ClienteMiddleware
{
    public function handle(Request $request, Closure $next): Response
        {
            // 🔥 SI NO ESTÁ LOGUEADO → NO BLOQUEAR NADA
            if (!auth()->check()) {
                return $next($request);
            }

            // 🔥 SI ES CLIENTE → OK
            if (auth()->user()->role === 'cliente') {
                return $next($request);
            }

            // 🔥 SI ES ADMIN → LO MANDAS A SU PANEL
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.inicio');
            }

            return $next($request);
    }
}