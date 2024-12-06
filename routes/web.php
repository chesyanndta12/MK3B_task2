<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Redirect '/' to '/login'
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard route
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile route
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Example ProductController route
Route::get('/dashboard', [ProductController::class, 'index'])->name('products.index');
