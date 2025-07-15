<?php
// File: app/Http/Controllers/Faculty/ProfileController.php
// Description: Handles faculty profile completion logic (Syllaverse)

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;

class ProfileController extends Controller
{
    /**
     * Show the complete profile form.
     */
    public function showCompleteForm()
    {
        $departments = Department::all();
        return view('faculty.complete-profile', compact('departments'));
    }

    /**
     * Handle the form submission.
     */
    public function submitProfile(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'employee_code' => 'required|string|max:50',
            'department_id' => 'required|exists:departments,id',
        ]);

        $user = Auth::user();
        $user->designation = $request->designation;
        $user->employee_code = $request->employee_code;
        $user->department_id = $request->department_id;
        $user->status = 'pending'; // 🔒 Keep account pending until approved by Admin
        $user->save();

        Auth::logout(); // 🔐 Force re-login to trigger middleware again
        return redirect()->route('faculty.login.form')
            ->with('success', 'Profile completed. Please wait for your Program Chair to approve your account.');
    }
}
