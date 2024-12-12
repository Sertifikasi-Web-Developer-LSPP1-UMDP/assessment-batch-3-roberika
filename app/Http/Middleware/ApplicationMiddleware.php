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
        // Tolak jika bukan user atau akun inaktif, menunggu verifikasi email, atau menunggu verifikasi admin
        if (!$request->user() || $request->user()->isInactive()) {
            // Tolak jika admin
            if ($request->user()->isAdmin()) {
                return redirect(route('admin.dashboard', absolute: false))
                    ->with('message', 'Akun admin tidak dapat digunakan untuk pendaftaran');
            }
            // Tolak jika akun telah mendaftar
            if ($request->user()->applicant()) {
                return redirect(route('dashboard', absolute: false))
                    ->with('message', 'Akun telah digunakan untuk pendaftaran');
            }
            return redirect(route('dashboard', absolute: false))
                ->with('error', 'Akun belum dapat digunakan untuk pendaftaran');
        }
        return $next($request);
    }
}
