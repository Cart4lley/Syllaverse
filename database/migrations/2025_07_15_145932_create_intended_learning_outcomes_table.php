<?php

// File: database/migrations/2025_07_15_000002_create_intended_learning_outcomes_table.php
// Description: Migration to create intended_learning_outcomes table for Admin Master Data module (Syllaverse)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('intended_learning_outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // e.g., ILO1, ILO2
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('intended_learning_outcomes');
    }
};

