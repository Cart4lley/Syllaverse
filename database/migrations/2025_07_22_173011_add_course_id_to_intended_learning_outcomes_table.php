<?php

// File: database/migrations/xxxx_xx_xx_xxxxxx_add_course_id_to_intended_learning_outcomes_table.php
// Description: Adds foreign key course_id to ILOs for course mapping (Syllaverse)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('intended_learning_outcomes', function (Blueprint $table) {
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('intended_learning_outcomes', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });
    }
};
