<?php

// ------------------------------------------------
// File: routes/web.php
// Description: Web Routes Configuration for Syllaverse
// ------------------------------------------------

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Login View
Route::get('/admin/login', function () {
    return view('auth.admin-login');
})->name('admin.login.form');

// Admin Dashboard
Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

// ✅ Admin Google Login Routes (Socialite)
Route::prefix('admin')->group(function () {
    Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('admin.google.login');
    Route::get('/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('admin.google.callback');
});

// Faculty
Route::get('/faculty/login', function () {
    return view('auth.faculty-login');
})->name('faculty.login.form');

// Student
Route::get('/student/login', function () {
    return view('auth.student-login');
})->name('student.login.form');

// Test middleware
Route::middleware(['test'])->get('/test-middleware', function () {
    return 'If you see "TestMiddleware is working!", the middleware works!';
});

// Load Super Admin routes
require __DIR__.'/superadmin.php';
