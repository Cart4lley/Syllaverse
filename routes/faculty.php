<?php

// ------------------------------------------------
// File: routes/faculty.php
// Description: Faculty-specific routes for login, dashboard, and logout (Syllaverse)
// ------------------------------------------------

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Faculty\AuthController as FacultyAuthController;
use App\Http\Controllers\Faculty\ProfileController;
use App\Http\Middleware\FacultyAuth;

// ---------- Faculty Login Form View (manual redirection) ----------
Route::get('/faculty/login', function () {
    return view('auth.faculty-login');
})->name('faculty.login.form');

// ---------- Google Login ----------
Route::get('/faculty/login/google', [FacultyAuthController::class, 'redirectToGoogle'])->name('faculty.google.login');
Route::get('/faculty/google/callback', [FacultyAuthController::class, 'handleGoogleCallback'])->name('faculty.google.callback');

// ---------- Faculty Profile Completion (Accessible before full access) ----------
Route::middleware(['auth'])->group(function () {
    Route::get('/faculty/complete-profile', [ProfileController::class, 'showCompleteForm'])->name('faculty.complete-profile');
    Route::post('/faculty/complete-profile', [ProfileController::class, 'submitProfile'])->name('faculty.complete-profile.submit');
});

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
