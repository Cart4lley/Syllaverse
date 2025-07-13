<?php

// ------------------------------------------------
// File: routes/web.php
// Description: Web Routes Configuration for Syllaverse
// ------------------------------------------------

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::get('/admin/login', function () {
    return view('auth.admin-login');
})->name('admin.login.form');

Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

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
