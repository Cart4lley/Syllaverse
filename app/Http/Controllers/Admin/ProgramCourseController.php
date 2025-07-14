<?php
// File: app/Http/Controllers/Admin/ProgramCourseController.php
// Description: Handles mapping/unmapping of courses to programs (Syllaverse)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramCourse;
use App\Models\Program;
use App\Models\Course;

class ProgramCourseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'course_id' => 'required|exists:courses,id',
            'year_level' => 'required|integer|min:1|max:4',
            'semester' => 'required|integer|min:1|max:3',
        ]);

        $exists = ProgramCourse::where([
            'program_id' => $request->program_id,
            'course_id' => $request->course_id
        ])->exists();

        if ($exists) {
            return back()->with('error', 'This course is already mapped to the program.');
        }

        ProgramCourse::create([
            'program_id' => $request->program_id,
            'course_id' => $request->course_id,
            'year_level' => $request->year_level,
            'semester' => $request->semester,
        ]);

        return back()->with('success', 'Course successfully mapped to program.');
    }

    public function destroy($id)
    {
        $mapping = ProgramCourse::findOrFail($id);
        $mapping->delete();

        return back()->with('success', 'Course removed from program.');
    }
}
