<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

// Admin Google Login
Route::get('/login', function () {
    return view('auth.admin-login');
})->name('admin.login.form');

Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('admin.google.login');
Route::get('/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('admin.google.callback');

// Dashboard
Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
