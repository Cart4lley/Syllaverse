<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
// File: database/migrations/xxxx_xx_xx_xxxxxx_create_course_prerequisite_table.php
// Description: Pivot table for course prerequisites in Syllaverse

public function up()
{
    Schema::create('course_prerequisite', function (Blueprint $table) {
        $table->id();
        $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
        $table->foreignId('prerequisite_id')->constrained('courses')->onDelete('cascade');
        $table->timestamps();
    });
}

};
