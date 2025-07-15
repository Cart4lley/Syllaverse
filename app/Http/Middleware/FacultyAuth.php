<?php
// File: app/Http/Middleware/FacultyAuth.php
// Description: Middleware to protect faculty-only routes (Syllaverse)

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'faculty') {
            return redirect()->route('faculty.google.login')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
