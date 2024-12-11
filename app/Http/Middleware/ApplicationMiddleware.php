<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Hanya terima jika status user bukan 7 (inactive, bukan aplikan)
        if (!$request->user() || $request->user()->where('status_id', 7)) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
