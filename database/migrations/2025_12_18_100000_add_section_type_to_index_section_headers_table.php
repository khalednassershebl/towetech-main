<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('index_section_headers', function (Blueprint $table) {
            $table->string('section_type')->default('services')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('index_section_headers', function (Blueprint $table) {
            $table->dropColumn('section_type');
        });
    }
};

