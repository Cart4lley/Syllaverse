<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminAuthController;
use App\Http\Controllers\SuperAdmin\DepartmentController;

// Root Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Super Admin Auth & Pages
Route::get('/superadmin/login', function () {
    return view('auth.superadmin-login');
})->name('superadmin.login.form');

Route::post('/superadmin/login', [SuperAdminAuthController::class, 'login'])->name('superadmin.login');


    Route::view('/superadmin/dashboard', 'superadmin.dashboard');
    Route::view('/superadmin/departments', 'superadmin.departments');
    Route::view('/superadmin/manage-accounts', 'superadmin.manage-accounts');
    Route::view('/superadmin/master-data', 'superadmin.master-data');
    Route::view('/superadmin/class-suspension', 'superadmin.class-suspension');
    Route::view('/superadmin/system-logs', 'superadmin.system-logs');
    Route::view('/superadmin/notifications', 'superadmin.notifications');
    Route::post('/superadmin/logout', [SuperAdminAuthController::class, 'logout'])->name('superadmin.logout');


// Admin Auth & Dashboard
Route::get('/admin/login', function () {
    return view('auth.admin-login');
});
Route::view('/admin/dashboard', 'admin.dashboard');

// Faculty Auth
Route::get('/faculty/login', function () {
    return view('auth.faculty-login');
});

// Student Auth
Route::get('/student/login', function () {
    return view('auth.student-login');
});


Route::middleware(['test'])->get('/test-middleware', function () {
    return 'If you see "TestMiddleware is working!", the middleware works!';
});
