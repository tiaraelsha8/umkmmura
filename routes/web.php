<?php

use Illuminate\Support\Facades\Route;

// LOGIN
use App\Http\Controllers\auth\AuthController;

// BACKEND
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;

// FRONTEND
use App\Http\Controllers\frontend\HomeController;

// ===================== LOGIN =====================
Route::middleware('guest')->group(function () {
    Route::get('/umkmlogin', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/umkmlogin', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================== BACKEND =====================
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');

        Route::resource('/user', UserController::class);

        Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    });

// ===================== FRONTEND =====================

Route::get('/', [HomeController::class, 'index'])->name('beranda');
