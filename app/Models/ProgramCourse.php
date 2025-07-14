<?php

// File: app/Models/ProgramCourse.php
// Description: Eloquent model for program-course mappings (Syllaverse)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'course_id',
        'year_level',
        'semester',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
