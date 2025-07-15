<?php

// File: database/migrations/2025_07_15_000001_create_student_outcomes_table.php
// Description: Migration to create student_outcomes table for Admin Master Data module (Syllaverse)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('student_outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // e.g., SO1, SO2
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_outcomes');
    }
};
