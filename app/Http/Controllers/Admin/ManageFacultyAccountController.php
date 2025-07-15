<?php
// File: app/Http/Controllers/Admin/ManageFacultyAccountController.php
// Description: Handles viewing, approving, and rejecting faculty accounts under the Admin's department (Syllaverse)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ManageFacultyAccountController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        // Only faculty in the same department
        $pendingFaculty = User::where('role', 'faculty')
            ->where('status', 'pending')
            ->where('department_id', $admin->department_id)
            ->get();

        $approvedFaculty = User::where('role', 'faculty')
            ->where('status', 'active')
            ->where('department_id', $admin->department_id)
            ->get();

        $rejectedFaculty = User::where('role', 'faculty')
            ->where('status', 'rejected')
            ->where('department_id', $admin->department_id)
            ->get();

        return view('admin.manage-accounts.index', compact('pendingFaculty', 'approvedFaculty', 'rejectedFaculty'));
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'faculty') {
            $user->status = 'active';
            $user->save();
        }

        return redirect()->back()->with('success', 'Faculty approved successfully.');
    }

    public function reject($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'faculty') {
            $user->status = 'rejected';
            $user->save();
        }

        return redirect()->back()->with('error', 'Faculty account rejected.');
    }
}
