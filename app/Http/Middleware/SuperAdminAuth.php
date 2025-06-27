<?php
// File: app/Http/Middleware/SuperAdminAuth.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuperAdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if superadmin is logged in
        if (!Session::get('superadmin_logged_in')) {
            // Redirect to login if not authenticated
            return redirect()->route('superadmin.login.form')
                ->with('error', 'You must be logged in to access this page.');
        }
        return $next($request);
    }
}
