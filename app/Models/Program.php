<?php

// File: app/Models/Program.php
// Description: Eloquent model for Program (Syllaverse)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'created_by',
        'name',
        'code',
        'description',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function courses()
    {
        return $this->hasMany(ProgramCourse::class);
    }
}

