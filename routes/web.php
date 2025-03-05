<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
| Routes accessible to all users (authenticated and unauthenticated).
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
| Routes accessible only to authenticated and verified users.
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard/Home
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
    });

    // Albums
    Route::prefix('albums')->group(function () {
        Route::get('/', [AlbumController::class, 'index'])->name('albums.index');
        Route::get('/{id}', [AlbumController::class, 'show'])->name('albums.show');
    });

    // Photos
    Route::prefix('photos')->group(function () {
        Route::get('/', [PhotoController::class, 'index'])->name('photos.index');
        Route::get('/{id}', [PhotoController::class, 'show'])->name('photos.show');
    });

    // Profile (provided by Laravel Breeze)
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
| Routes for authentication (login, registration, password reset, etc.).
*/
require __DIR__.'/auth.php';
