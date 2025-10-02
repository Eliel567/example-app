<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('auth')) {
            return redirect()->route('login')->withErrors(['error' => 'Você precisa estar logado.']);
        }

        return $next($request);
    }
}
