<?php

// ------------------------------------------------
// File: routes/admin.php
// Description: Admin specific routes for Syllaverse
// ------------------------------------------------

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController; // Add this
use App\Http\Middleware\AdminAuth;

// Admin Login View
Route::get('/login', function () {
    return view('auth.admin-login');
})->name('admin.login.form');

// Google Login & Callback
Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('admin.google.login');
Route::get('/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('admin.google.callback');

// Profile Completion Form (Accessible even without complete profile)
Route::get('/complete-profile', [ProfileController::class, 'showCompleteForm'])->name('admin.complete-profile');
Route::post('/complete-profile', [ProfileController::class, 'submitProfile'])->name('admin.submit-profile');

// Protected Admin Routes (Requires role = admin and complete profile)
Route::middleware([AdminAuth::class])->group(function () {

    // Admin Dashboard
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');

    // Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('admin.login.form')->with('success', 'Logged out successfully.');
    })->name('admin.logout');

    // (Add more admin-protected routes here...)
});
