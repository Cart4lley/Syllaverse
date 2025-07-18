<?php

// File: database/migrations/xxxx_xx_xx_xxxxxx_add_contact_hours_to_courses_table.php
// Description: Adds contact_hours_lec and contact_hours_lab to courses table

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('contact_hours_lec')->default(0);
            $table->integer('contact_hours_lab')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['contact_hours_lec', 'contact_hours_lab']);
        });
    }
};

