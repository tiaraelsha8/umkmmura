<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
     public function handle($request, Closure $next, $roles = null)
    {
        // pastikan login
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // ambil semua argumen selain $request dan $next
        $args = array_slice(func_get_args(), 2); // semua param role yang dikirim

        // normalisasi: kalau args cuma 1 dan berisi koma => explode
        if (count($args) === 1 && is_string($args[0]) && strpos($args[0], ',') !== false) {
            $allowed = array_map('trim', explode(',', $args[0]));
        } else {
            // kalau banyak args (role:admin,role:superadmin) atau single tanpa koma
            $allowed = array_map('trim', $args);
        }

        // jika tidak ada role dikirim sama sekali => block
        if (empty($allowed) || (count($allowed) === 1 && $allowed[0] === '')) {
            abort(403, 'No role specified for middleware.');
        }

        // cek apakah user->role ada di allowed
        // sesuaikan jika di model kamu menggunakan relasi/array (ubah logika di sini)
        if (in_array($user->role, $allowed, true)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
