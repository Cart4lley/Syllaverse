<?php
// File: app/Http/Middleware/FacultyAuth.php
// Description: Middleware to protect faculty-only routes and ensure profile completion and approval (Syllaverse)

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Not logged in or not a faculty
        if (!Auth::check() || Auth::user()->role !== 'faculty') {
            return redirect()->route('faculty.login.form')->with('error', 'Access denied. Please log in as faculty.');
        }

        $user = Auth::user();

        // Incomplete profile
        if (
            empty($user->designation) ||
            empty($user->employee_code) ||
            is_null($user->department_id)
        ) {
            return redirect()->route('faculty.complete-profile')
                ->with('error', 'Please complete your profile before accessing the dashboard.');
        }

        // Awaiting admin approval
        if ($user->status !== 'active') {
            Auth::logout();
            return redirect()->route('faculty.login.form')->with('error', 'Your account is pending approval by your Program Chair.');
        }

        return $next($request);
    }
}
