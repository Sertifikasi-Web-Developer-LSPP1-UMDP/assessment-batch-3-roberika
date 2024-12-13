<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class NonAdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pindah ke dashboard admin jika bukan user atau user adalah admin
        if (!Auth::user() || Auth::user()->isAdmin()) {
            return redirect(route('admin.dashboard', absolute: false))
                ->with('message', 'Akun admin tidak dapat digunakan untuk mengakses laman tersebut');
        }
        return $next($request);
    }
}
