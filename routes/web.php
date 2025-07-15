<?php

// ------------------------------------------------
// File: routes/web.php
// Description: Web Routes Configuration for Syllaverse
// ------------------------------------------------

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Faculty\AuthController as FacultyAuthController;

// ------------------------------------------------
// Redirect root to Super Admin login
// ------------------------------------------------
Route::get('/', function () {
    return redirect()->route('superadmin.login.form');
});

// ------------------------------------------------
// Super Admin Routes
// ------------------------------------------------
require __DIR__.'/superadmin.php';

// ------------------------------------------------
// Admin Routes (Modularized)
// ------------------------------------------------
Route::prefix('admin')->group(function () {
    require __DIR__.'/admin.php';
});

// ------------------------------------------------
// Faculty Login View (with Google Login Button)
// ------------------------------------------------
Route::get('/faculty/login', function () {
    return view('auth.faculty-login');
})->name('faculty.login.form');

// ------------------------------------------------
// Faculty Routes (Modularized)
// ------------------------------------------------
require __DIR__.'/faculty.php';

// ------------------------------------------------
// Student Login Route (UI only, for now)
// ------------------------------------------------
Route::get('/student/login', function () {
    return view('auth.student-login');
})->name('student.login.form');
