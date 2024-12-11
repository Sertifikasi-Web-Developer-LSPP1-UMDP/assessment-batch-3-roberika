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
        // Hanya terima jika ada user dan user adalah admin
        if (!$request->user() || !$request->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}