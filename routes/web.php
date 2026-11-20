<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreProfileController;
use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

// Halaman setelah login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('products', ProductController::class)->only('index');
    Route::resource('categories', CategoryController::class)->only('index');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','admin'])->group(function () {
   Route::resource('categories', CategoryController::class)->except('index');
   Route::resource('products', ProductController::class)->except('index');
   Route::get('/store-profile', [StoreProfileController::class, 'index'])
    ->name('store-profile.index');
    Route::get('/activity-logs', [ActivityLogController::class, 'index'])
    ->name('activity-logs.index');

        });