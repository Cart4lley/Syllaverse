<?php
// File: app/Http/Controllers/Admin/AcademicStructureController.php
// Description: Loads programs and courses for Academic Structure page

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\Course;
use App\Models\ProgramCourse;

class AcademicStructureController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $programs = Program::where('department_id', $user->department_id)->get();
        $courses = Course::where('department_id', $user->department_id)->get();

        $programCourseMap = ProgramCourse::with('course')
            ->whereIn('program_id', $programs->pluck('id'))
            ->get();

        return view('admin.academic-structure.index', compact('programs', 'courses', 'programCourseMap'));
    }
}
