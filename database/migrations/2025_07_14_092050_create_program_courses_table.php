<?php

// File: database/migrations/xxxx_xx_xx_create_program_courses_table.php
// Description: Mapping table between programs and courses with year/semester info

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('program_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('year_level'); // e.g., 1 to 4
            $table->unsignedTinyInteger('semester');   // e.g., 1 = 1st Sem, 2 = 2nd Sem, 3 = Summer
            $table->timestamps();

            $table->unique(['program_id', 'course_id'], 'program_course_unique');
        });
    }

    public function down(): void {
        Schema::dropIfExists('program_courses');
    }
};

