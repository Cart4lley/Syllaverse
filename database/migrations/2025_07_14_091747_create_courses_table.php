<?php

// File: database/migrations/xxxx_xx_xx_create_courses_table.php
// Description: Creates the courses table linked to departments

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->string('code')->unique();
            $table->string('title');
            $table->integer('units_lec');
            $table->integer('units_lab')->default(0);
            $table->integer('total_units');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('courses');
    }
};

