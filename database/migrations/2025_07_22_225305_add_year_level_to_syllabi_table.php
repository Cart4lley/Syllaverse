<?php

// File: database/migrations/2025_07_23_000001_add_year_level_to_syllabi_table.php
// Description: Adds year_level column to syllabi table (Syllaverse)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('syllabi', function (Blueprint $table) {
            $table->string('year_level')->after('semester');
        });
    }

    public function down(): void
    {
        Schema::table('syllabi', function (Blueprint $table) {
            $table->dropColumn('year_level');
        });
    }
};
