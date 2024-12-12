<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Tolak jika bukan user atau user adalah bukan admin
        if (!$request->user() || $request->user()->isNonAdmin()) {
            abort(403, 'Silahkan gunakan akun admin.');
        }
        return $next($request);
    }
}
