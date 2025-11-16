<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MembershipController;


// ================== AUTH ==================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================== DASHBOARD ROUTES ==================
Route::middleware(['auth'])->group(function () {

    // Dashboard user biasa
    Route::get('/user/dashboard', [DashboardController::class, 'user'])
        ->name('user.dashboard');

    // Dashboard admin
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
            ->name('admin.dashboard');
    });
});


// ================== DEFAULT ROUTE ==================
Route::get('/', function () {
    return redirect()->route('login');
});
