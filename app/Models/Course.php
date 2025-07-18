<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'code',
        'title',
        'units_lec',
        'units_lab',
        'total_units',
        'contact_hours_lec',
        'contact_hours_lab',
        'description',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // 🔁 Many-to-Many self-relationship: prerequisites
    public function prerequisites()
    {
        return $this->belongsToMany(Course::class, 'course_prerequisite', 'course_id', 'prerequisite_id');
    }

    // 🔁 Reverse: list of courses where this course is a prerequisite
    public function isPrerequisiteFor()
    {
        return $this->belongsToMany(Course::class, 'course_prerequisite', 'prerequisite_id', 'course_id');
    }
}
