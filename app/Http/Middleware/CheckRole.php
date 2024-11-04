<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Permitir acceso solo si el usuario tiene el rol requerido o es admin
        if ($user->role === 'admin' ) {
            return $next($request);
        }
        
        return redirect('/login');
    }
}
