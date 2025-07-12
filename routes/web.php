<?php

// ------------------------------------------------
// File: routes/web.php
// Description: Web Routes Configuration for Syllaverse
// ------------------------------------------------

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminAuthController;
use App\Http\Controllers\SuperAdmin\DepartmentController;
use App\Http\Controllers\SuperAdmin\MasterDataController;

// ----------------------
// Root Welcome Page
// ----------------------
Route::get('/', function () {
    return view('welcome');
});

// ----------------------
// Super Admin Authentication
// ----------------------
Route::get('/superadmin/login', function () {
    return view('auth.superadmin-login');
})->name('login');

Route::post('/superadmin/login', [SuperAdminAuthController::class, 'login'])->name('superadmin.login');
Route::post('/superadmin/logout', [SuperAdminAuthController::class, 'logout'])->name('superadmin.logout');

// ----------------------
// Super Admin Protected Routes
// ----------------------
Route::middleware(['auth'])->prefix('superadmin')->group(function () {
    // Dashboard & Static Pages
    Route::view('/dashboard', 'superadmin.dashboard')->name('superadmin.dashboard');
    Route::view('/manage-accounts', 'superadmin.manage-accounts')->name('superadmin.manage-accounts');
    Route::view('/class-suspension', 'superadmin.class-suspension')->name('superadmin.class-suspension');
    Route::view('/system-logs', 'superadmin.system-logs')->name('superadmin.system-logs');
    Route::view('/notifications', 'superadmin.notifications')->name('superadmin.notifications');

    // Master Data (Skills & Outcomes + Information Tab)
    Route::get('/master-data', [MasterDataController::class, 'index'])->name('superadmin.master-data');
    Route::post('/master-data/{type}', [MasterDataController::class, 'store'])->name('superadmin.master-data.store');
    Route::put('/master-data/{type}/{id}', [MasterDataController::class, 'update'])->name('superadmin.master-data.update');
    Route::delete('/master-data/{type}/{id}', [MasterDataController::class, 'destroy'])->name('superadmin.master-data.destroy');

    // General Academic Information
    Route::put('/general-info/{section}', [MasterDataController::class, 'updateGeneralInfo'])->name('superadmin.general-info.update');

    // Department Management
    Route::get('/departments', [DepartmentController::class, 'index'])->name('superadmin.departments.index');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('superadmin.departments.store');
    Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('superadmin.departments.update');
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('superadmin.departments.destroy');
});

// ----------------------
// Admin Authentication & Dashboard
// ----------------------
Route::get('/admin/login', function () {
    return view('auth.admin-login');
})->name('admin.login.form');

Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

// ----------------------
// Faculty Authentication
// ----------------------
Route::get('/faculty/login', function () {
    return view('auth.faculty-login');
})->name('faculty.login.form');

// ----------------------
// Student Authentication
// ----------------------
Route::get('/student/login', function () {
    return view('auth.student-login');
})->name('student.login.form');

// ----------------------
// Test Middleware Route
// ----------------------
Route::middleware(['test'])->get('/test-middleware', function () {
    return 'If you see "TestMiddleware is working!", the middleware works!';
});
