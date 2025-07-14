<?php

// ------------------------------------------------
// File: routes/web.php
// Description: Web Routes Configuration for Syllaverse
// ------------------------------------------------

use Illuminate\Support\Facades\Route;

// ------------------------------------------------
// Redirect root to Super Admin login
// ------------------------------------------------
Route::get('/', function () {
    return redirect()->route('superadmin.login.form');
});

// ------------------------------------------------
// Faculty Routes
// ------------------------------------------------

Route::get('/faculty/login', function () {
    return view('auth.faculty-login');
})->name('faculty.login.form');

// ------------------------------------------------
// Student Routes
// ------------------------------------------------

Route::get('/student/login', function () {
    return view('auth.student-login');
})->name('student.login.form');

// ------------------------------------------------
// Load Super Admin Routes
// ------------------------------------------------

require __DIR__.'/superadmin.php';

// ------------------------------------------------
// Load Admin Routes (Modularized)
// ------------------------------------------------

Route::prefix('admin')->group(function () {
    require __DIR__.'/admin.php';
});
