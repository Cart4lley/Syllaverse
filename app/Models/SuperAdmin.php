<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
    // Add any needed fields, relationships, etc.
    protected $fillable = [
        'username',
        'password',
        // Add other relevant fields
    ];

    protected $hidden = [
        'password',
    ];
}
