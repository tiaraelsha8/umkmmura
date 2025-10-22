<?php

use Illuminate\Support\Facades\Route;

// LOGIN
use App\Http\Controllers\auth\AuthController;

// BACKEND
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserController;

// FRONTEND
use App\Http\Controllers\frontend\HomeController;


// ===================== LOGIN =====================
Route::middleware('guest')->group(function () {

    Route::get('/umkmlogin', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/umkmlogin', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================== BACKEND =====================
Route::prefix('admin')->middleware('auth')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');

    Route::resource('/user', UserController::class);

   
});

// ===================== FRONTEND =====================

Route::get('/', [HomeController::class, 'index'])->name('beranda');







