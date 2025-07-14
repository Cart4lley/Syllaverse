<?php
// File: app/Http/Controllers/Admin/ProfileController.php
// Description: Handles admin profile completion (Syllaverse)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form to complete admin profile.
     */
    public function showCompleteForm()
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login.form')->with('error', 'You must log in first.');
        }

        $user = Auth::user();
        return view('admin.complete-profile', compact('user'));
    }

    /**
     * Handle profile submission.
     */
    public function submitProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login.form')->with('error', 'You must log in first.');
        }

        $request->validate([
            'designation' => 'required|string|max:100',
            'employee_code' => 'required|string|max:20',
        ]);

        $user = Auth::user();
        $user->designation = $request->designation;
        $user->employee_code = $request->employee_code;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Profile completed successfully!');
    }
}
