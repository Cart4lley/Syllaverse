<?php

// File: app/Models/GeneralInformation.php
// Description: Model for storing general academic information like Mission, Vision, etc.

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    protected $table = 'general_information';

    protected $fillable = ['section', 'content'];

    public $timestamps = true;
}
