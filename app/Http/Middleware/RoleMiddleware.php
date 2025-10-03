<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
       // Coba ambil user dari guard admin dulu (karena kamu pakai auth:admin)
        $user = Auth::guard('admin')->check() ? Auth::guard('admin')->user() : Auth::user();

        // Kalau belum login -> redirect ke login admin (atau route yang sesuai)
        if (! $user) {
            return redirect()->route('login.admin');
        }

        // Kalau role tidak cocok -> forbidden
        if (! in_array($user->role, $roles)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
