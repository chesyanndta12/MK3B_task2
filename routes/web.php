<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::view('/', 'index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth'])->name('dashboard');


