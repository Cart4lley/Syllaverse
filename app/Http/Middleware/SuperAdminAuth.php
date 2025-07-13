<?php
// File: app/Http/Middleware/SuperAdminAuth.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuperAdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::get('is_superadmin')) {
            return redirect()->route('superadmin.login.form')
                ->with('error', 'You must be logged in to access this page.');
        }
        return $next($request);
    }
}

