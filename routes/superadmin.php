<?php

// ------------------------------------------------
// File: routes/superadmin.php
// Description: Super Admin specific routes for Syllaverse
// ------------------------------------------------

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\AuthController;
use App\Http\Controllers\SuperAdmin\DepartmentController;
use App\Http\Controllers\SuperAdmin\MasterDataController;
use App\Http\Middleware\SuperAdminAuth;

// ---------- Public Super Admin Login ----------
Route::middleware('guest')->group(function () {
    Route::get('/superadmin/login', function () {
        return view('auth.superadmin-login');
    })->name('superadmin.login.form');

    Route::post('/superadmin/login', [AuthController::class, 'login'])->name('superadmin.login');
});

// ---------- Super Admin Protected Routes ----------
Route::middleware([SuperAdminAuth::class])->prefix('superadmin')->group(function () {

    // ---------- Logout ----------
    Route::post('/logout', [AuthController::class, 'logout'])->name('superadmin.logout');

    // ---------- Dashboard & Static Pages ----------
    Route::view('/dashboard', 'superadmin.dashboard')->name('superadmin.dashboard');
    Route::view('/manage-accounts', 'superadmin.manage-accounts')->name('superadmin.manage-accounts');
    Route::view('/class-suspension', 'superadmin.class-suspension')->name('superadmin.class-suspension');
    Route::view('/system-logs', 'superadmin.system-logs')->name('superadmin.system-logs');
    Route::view('/notifications', 'superadmin.notifications')->name('superadmin.notifications');

    // ---------- Master Data ----------
    Route::prefix('master-data')->group(function () {
        Route::get('/', [MasterDataController::class, 'index'])->name('superadmin.master-data');
        Route::post('/{type}', [MasterDataController::class, 'store'])->name('superadmin.master-data.store');
        Route::put('/{type}/{id}', [MasterDataController::class, 'update'])->name('superadmin.master-data.update');
        Route::delete('/{type}/{id}', [MasterDataController::class, 'destroy'])->name('superadmin.master-data.destroy');
    });

    // ---------- General Academic Information ----------
    Route::put('/general-info/{section}', [MasterDataController::class, 'updateGeneralInfo'])->name('superadmin.general-info.update');

    // ---------- Departments ----------
    Route::prefix('departments')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('superadmin.departments.index');
        Route::post('/', [DepartmentController::class, 'store'])->name('superadmin.departments.store');
        Route::put('/{id}', [DepartmentController::class, 'update'])->name('superadmin.departments.update');
        Route::delete('/{id}', [DepartmentController::class, 'destroy'])->name('superadmin.departments.destroy');
    });
});
