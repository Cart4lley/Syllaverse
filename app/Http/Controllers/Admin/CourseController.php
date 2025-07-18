<?php
// File: app/Http/Controllers/Admin/CourseController.php
// Description: Handles create, update, and delete of Courses (Admin - Syllaverse)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Store a new course.
     */
    public function store(Request $request)
    {
        if (Auth::user()->department_id === null) {
            return redirect()->back()->with('error', 'You cannot create a course until you are assigned to a department by the Super Admin.');
        }

        $request->validate([
            'code' => 'required|string|max:25|unique:courses,code',
            'title' => 'required|string|max:255',
            'units_lec' => 'required|integer|min:0',
            'units_lab' => 'nullable|integer|min:0',
            'contact_hours_lec' => 'required|integer|min:0',
            'contact_hours_lab' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'prerequisite_ids' => 'nullable|array',
            'prerequisite_ids.*' => 'exists:courses,id',
        ]);

        $course = Course::create([
            'code' => $request->code,
            'title' => $request->title,
            'units_lec' => $request->units_lec,
            'units_lab' => $request->units_lab ?? 0,
            'total_units' => $request->units_lec + ($request->units_lab ?? 0),
            'contact_hours_lec' => $request->contact_hours_lec,
            'contact_hours_lab' => $request->contact_hours_lab,
            'description' => $request->description,
            'department_id' => Auth::user()->department_id,
        ]);

        if ($request->filled('prerequisite_ids')) {
            $course->prerequisites()->sync($request->prerequisite_ids);
        }

        return redirect()->route('admin.academic-structure.index')->with('course_success', 'Course added successfully!');
    }

    /**
     * Update an existing course.
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'code' => 'required|string|max:25|unique:courses,code,' . $course->id,
            'title' => 'required|string|max:255',
            'units_lec' => 'required|integer|min:0',
            'units_lab' => 'nullable|integer|min:0',
            'contact_hours_lec' => 'required|integer|min:0',
            'contact_hours_lab' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'prerequisite_ids' => 'nullable|array',
            'prerequisite_ids.*' => 'exists:courses,id',
        ]);

        $course->update([
            'code' => $request->code,
            'title' => $request->title,
            'units_lec' => $request->units_lec,
            'units_lab' => $request->units_lab ?? 0,
            'total_units' => $request->units_lec + ($request->units_lab ?? 0),
            'contact_hours_lec' => $request->contact_hours_lec,
            'contact_hours_lab' => $request->contact_hours_lab,
            'description' => $request->description,
        ]);

        $course->prerequisites()->sync($request->prerequisite_ids ?? []);

        return redirect()->route('admin.academic-structure.index')->with('course_success', 'Course updated successfully!');
    }

    /**
     * Delete a course.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->prerequisites()->detach();
        $course->delete();

        return redirect()->route('admin.academic-structure.index')->with('course_success', 'Course deleted successfully!');
    }
}
