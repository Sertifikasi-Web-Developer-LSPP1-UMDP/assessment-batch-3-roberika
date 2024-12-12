<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NonAdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Tolak jika bukan user atau user adalah admin (untuk pendaftaran karena akun admin tidak untuk daftar)
        if (!$request->user() || $request->user()->where('status_id', 5)) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
