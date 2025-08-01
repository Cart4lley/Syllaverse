<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('courses', function (Blueprint $table) {
        $table->integer('contact_hours_lec')->nullable()->after('total_units');
        $table->integer('contact_hours_lab')->nullable()->after('contact_hours_lec');
    });
}

};
