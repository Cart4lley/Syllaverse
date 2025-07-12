<?php

// File: database/migrations/xxxx_xx_xx_xxxxxx_create_general_information_table.php
// Description: Creates the table for storing general academic information (e.g. mission, vision, etc.)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('general_information', function (Blueprint $table) {
            $table->id();
            $table->string('section')->unique(); // e.g., 'mission', 'vision', etc.
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('general_information');
    }
};

