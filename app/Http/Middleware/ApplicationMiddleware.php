<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

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
        if (!Auth::user() || Auth::user()->isInactive()) {
            return redirect(route('dashboard', absolute: false))
                ->with('error', 'Akun belum dapat digunakan untuk melakukan pendaftaran');
        }
        // Tolak jika admin
        if (Auth::user()->isAdmin()) {
            return redirect(route('admin.dashboard', absolute: false))
                ->with('message', 'Akun admin tidak dapat digunakan untuk pendaftaran');
        }
        // Tolak jika akun telah mendaftar
        if (Auth::user()->hasApplied()) {
            return redirect(route('dashboard', absolute: false))
                ->with('message', 'Akun telah digunakan untuk pendaftaran');
        }
        return $next($request);
    }
}
