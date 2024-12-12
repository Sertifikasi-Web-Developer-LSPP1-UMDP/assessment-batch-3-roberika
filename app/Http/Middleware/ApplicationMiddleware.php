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
        // Tolak jika bukan user, status user inaktif, atau aplikan
        if (!$request->user() || $request->user()->where('status_id', 3) || $request->user()->applicant()) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
