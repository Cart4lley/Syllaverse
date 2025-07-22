<?php
// File: app/Http/Controllers/Admin/ProgramController.php
// Description: Handles create, update, and delete of Programs (Admin - Syllaverse)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;

class ProgramController extends Controller
{
    /**
     * Store a new program.
     */
    public function store(Request $request)
    {
        // Prevent creation if no department assigned
        if (Auth::user()->department_id === null) {
            return redirect()->back()->with('error', 'You cannot create a program until you are assigned to a department by the Super Admin.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:25|unique:programs,code',
            'description' => 'nullable|string',
        ]);

        Program::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'department_id' => Auth::user()->department_id,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.master-data.index')->with('success', 'Program added successfully!');
    }

    /**
     * Update an existing program.
     */
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:25|unique:programs,code,' . $program->id,
            'description' => 'nullable|string',
        ]);

        $program->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.master-data.index')->with('success', 'Program updated successfully!');
    }

    /**
     * Delete a program.
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.master-data.index')->with('success', 'Program deleted successfully!');
    }
}
