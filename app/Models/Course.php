<?php

// File: app/Models/Course.php
// Description: Eloquent model for Course (Syllaverse)

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
        'description',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}

