<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimulatorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

// Logout (auth required)
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

// Simulator (auth required — any role)
Route::middleware('auth')->group(function () {
    Route::get('/simulator', [SimulatorController::class, 'index'])->name('simulator');
});

// Admin routes (auth + admin role)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
    Route::put('/content/{key}', [ContentController::class, 'update'])->name('content.update');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
