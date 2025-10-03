<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class AdminAuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login-admin');
    }

    // Proses login
    public function login(Request $request)
    {
        // ✅ Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Buat key berdasarkan IP dan username untuk rate limit
        $key = Str::lower($request->input('username')) . '|' . $request->ip();

        // Jika terlalu banyak percobaan
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);
            return back()->withErrors([
                'username' => "Terlalu banyak percobaan gagal. Coba lagi dalam {$minutes} menit.",
            ]);
        }

        // ✅ Ambil credential username & password saja (tanpa CAPTCHA!)
        $credentials = $request->only('username', 'password');

        // Proses login
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            RateLimiter::clear($key);

            session(['username' => Auth::guard('admin')->user()->username]);
            return redirect()->route('backend.dashboard');
        }

        // Gagal login, tambah hitungan rate limit
        RateLimiter::hit($key, 300); // Lock selama 300 detik (5 menit)

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        // ✅ Logout pakai guard admin
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.admin')->with('success', 'Anda telah logout');
    }
}
