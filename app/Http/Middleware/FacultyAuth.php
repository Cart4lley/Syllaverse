<?php
// File: app/Http/Middleware/FacultyAuth.php
// Description: Middleware to protect faculty-only routes and ensure profile completion (Syllaverse)

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyAuth
{
    public function handle(Request $request, Closure $next)
    {
        // If user is not logged in or not a faculty, redirect to login form
        if (!Auth::check() || Auth::user()->role !== 'faculty') {
            return redirect()->route('faculty.login.form')->with('error', 'Access denied. Please log in as faculty.');
        }

        $user = Auth::user();

        // Redirect to complete profile if any required field is missing
        if (
            empty($user->designation) ||
            empty($user->employee_code) ||
            is_null($user->department_id)
        ) {
            return redirect()->route('faculty.complete-profile')
                ->with('error', 'Please complete your profile before accessing the dashboard.');
        }

        return $next($request);
    }
}
