<?php

use Illuminate\Support\Facades\Route;

// LOGIN
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\ResetPasswordController;

// BACKEND
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\KbliController;
use App\Http\Controllers\backend\DataUmumController;

// FRONTEND
use App\Http\Controllers\frontend\HomeController;

// ===================== LOGIN =====================
Route::middleware('guest')->group(function () {
    Route::get('/umkmlogin', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/umkmlogin', [AuthController::class, 'login'])->name('login.submit');

    // Forgot password
    Route::get('/password/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // Reset password
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================== BACKEND =====================
Route::prefix('admin')->middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');

        Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('/dataumum', DataUmumController::class);

         // Hanya superadmin dan admin yang boleh kelola
        Route::middleware(['role:admin,superadmin'])->group(function () {
            Route::resource('/kbli', KbliController::class);
            Route::post('kbli-import', [KbliController::class, 'import'])->name('kbli.import');
        });

        // Hanya superadmin yang boleh kelola
        Route::middleware(['role:superadmin'])->group(function () {
            Route::resource('/user', UserController::class);
        });
      
    });

// ===================== FRONTEND =====================

Route::get('/', [HomeController::class, 'index'])->name('beranda');
