<?php

// File: database/migrations/2025_07_23_000000_create_syllabi_table.php
// Description: Migration for storing syllabi created by faculty (Syllaverse)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('syllabi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faculty_id');
            $table->unsignedBigInteger('program_id')->nullable(); // optional for now
            $table->unsignedBigInteger('course_id');
            $table->string('title'); // e.g., Syllabus in BAT 403
            $table->text('mission');
            $table->text('vision');
            $table->string('academic_year');
            $table->string('semester');
            $table->timestamps();

            $table->foreign('faculty_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('syllabi');
    }
};
