<?php

use Illuminate\Support\Facades\Route;

// LOGIN
use App\Http\Controllers\auth\AdminAuthController;

// BACKEND
use App\Http\Controllers\backend\DashboardController;

// FRONTEND
use App\Http\Controllers\frontend\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

// ===================== LOGIN ADMIN =====================
Route::middleware('guest:admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login.admin');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.admin.submit');
});

Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ===================== BACKEND =====================
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');

    // Hanya superadmin yang boleh kelola user
    Route::middleware(['role:superadmin'])->group(function () {
        Route::resource('/users', UserController::class);
    });

});

// ===================== FRONTEND =====================

Route::get('/', [HomeController::class, 'index'])->name('beranda');







