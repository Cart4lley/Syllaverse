<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up(): void
{
    Schema::table('sdgs', function ($table) {
        $table->string('title')->after('id');
    });

    Schema::table('igas', function ($table) {
        $table->string('title')->after('id');
    });

    Schema::table('cdios', function ($table) {
        $table->string('title')->after('id');
    });
}

public function down(): void
{
    Schema::table('sdgs', function ($table) {
        $table->dropColumn('title');
    });

    Schema::table('igas', function ($table) {
        $table->dropColumn('title');
    });

    Schema::table('cdios', function ($table) {
        $table->dropColumn('title');
    });
}

};
