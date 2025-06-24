<?php
// Block: routes-web
// File: routes/web.php

use Illuminate\Support\Facades\Route;

//------------------------------------------------
// * Root Welcome Page
//------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

//------------------------------------------------
// * Super Admin Auth & Pages
//------------------------------------------------
Route::get('/superadmin/login', function () {
    return view('auth.superadmin-login');
});
Route::view('/superadmin/dashboard', 'superadmin.dashboard');
Route::view('/superadmin/departments', 'superadmin.departments');
Route::view('/superadmin/manage-accounts', 'superadmin.manage-accounts');
Route::view('/superadmin/master-data', 'superadmin.master-data');
Route::view('/superadmin/class-suspension', 'superadmin.class-suspension');
Route::view('/superadmin/system-logs', 'superadmin.system-logs'); // ✅ Added
Route::view('/superadmin/notifications', 'superadmin.notifications');

//------------------------------------------------
// * Admin Auth & Dashboard
//------------------------------------------------
Route::get('/admin/login', function () {
    return view('auth.admin-login');
});
Route::view('/admin/dashboard', 'admin.dashboard');

//------------------------------------------------
// * Faculty Auth
//------------------------------------------------
Route::get('/faculty/login', function () {
    return view('auth.faculty-login');
});

//------------------------------------------------
// * Student Auth
//------------------------------------------------
Route::get('/student/login', function () {
    return view('auth.student-login');
});
