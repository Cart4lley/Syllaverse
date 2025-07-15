<?php

// ------------------------------------------------
// File: routes/faculty.php
// Description: Faculty-specific routes for login, dashboard, and logout (Syllaverse)
// ------------------------------------------------

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Faculty\AuthController as FacultyAuthController;
use App\Http\Middleware\FacultyAuth;

// ---------- Google Login ----------
Route::get('/faculty/login/google', [FacultyAuthController::class, 'redirectToGoogle'])->name('faculty.google.login');
Route::get('/faculty/google/callback', [FacultyAuthController::class, 'handleGoogleCallback'])->name('faculty.google.callback');

// ---------- Faculty-Only Protected Routes ----------
Route::middleware([FacultyAuth::class])->group(function () {
    Route::view('/faculty/dashboard', 'faculty.dashboard')->name('faculty.dashboard');

    // More protected routes here in the future
});

// ---------- Logout ----------
Route::post('/faculty/logout', function () {
    Auth::logout();
    return redirect()->route('faculty.login.form')->with('success', 'Logged out successfully.');
})->name('faculty.logout');
