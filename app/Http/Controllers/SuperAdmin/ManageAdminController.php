<?php
// File: app/Http/Controllers/SuperAdmin/ManageAdminController.php
// Description: Handles admin account approval and data loading for Manage Accounts (Syllaverse)

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;

class ManageAdminController extends Controller
{
    public function index()
    {
        $pendingAdmins = User::where('role', 'admin')->where('status', 'pending')->get();
        $approvedAdmins = User::where('role', 'admin')->where('status', 'active')->get();
        $rejectedAdmins = User::where('role', 'admin')->where('status', 'rejected')->get();

        $faculty = User::where('role', 'faculty')->get();
        $students = User::where('role', 'student')->get();

        // ✅ Load departments for assigning to admins
        $departments = Department::orderBy('name')->get();

        return view('superadmin.manage-accounts', compact(
            'pendingAdmins',
            'approvedAdmins',
            'rejectedAdmins',
            'faculty',
            'students',
            'departments'
        ));
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            $user->status = 'active';
            $user->save();
        }

        return redirect()->back()->with('success', 'Admin approved successfully.');
    }

    public function reject($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            $user->status = 'rejected';
            $user->save();
        }

        return redirect()->back()->with('success', 'Admin rejected/revoked successfully.');
    }
}
