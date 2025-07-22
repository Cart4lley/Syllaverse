<?php
// File: app/Http/Controllers/Admin/AcademicStructureController.php
// Description: Loads programs and courses for Academic Structure page (no program-course mapping)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;
use App\Models\Course;

class AcademicStructureController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $programs = Program::where('department_id', $user->department_id)->get();
        $courses = Course::where('department_id', $user->department_id)->get();

        return view('admin.academic-structure.index', compact('programs', 'courses'));
    }
}
