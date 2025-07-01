<?php
// File: app/Models/Department.php
// Department Model

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // If your User model is in App\Models

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    // Relationship: Department was created by a user (super admin)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
