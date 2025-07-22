<?php

// File: app/Models/IntendedLearningOutcome.php
// Description: Eloquent model for the intended_learning_outcomes table (Syllaverse)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntendedLearningOutcome extends Model
{
    use HasFactory;

    // 🛠️ Include course_id to allow saving course-linked ILOs
    protected $fillable = ['code', 'description', 'course_id'];

    // 🔁 Relationship: Each ILO belongs to one course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
