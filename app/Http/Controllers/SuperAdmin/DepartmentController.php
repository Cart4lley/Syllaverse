<?php
// File: app/Http/Controllers/SuperAdmin/DepartmentController.php
// Controller for managing departments (Super Admin)

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    // Show all departments
    public function index()
    {
        $departments = Department::with('creator')->latest()->get();
        return view('superadmin.departments', compact('departments'));
    }

    // Store a new department
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:25|unique:departments,code',
        ]);

        Department::create([
            'name' => $request->name,
            'code' => $request->code
        ]);

        return redirect()->back()->with('success', 'Department added successfully!');
    }

    // Update a department
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:25|unique:departments,code,'.$id,
        ]);

        $department->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->back()->with('success', 'Department updated successfully!');
    }

    // Delete a department
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->back()->with('success', 'Department deleted successfully!');
    }
}
