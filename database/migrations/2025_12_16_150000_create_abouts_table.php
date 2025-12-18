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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle_ar')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->string('title_ar');
            $table->string('title_en');
            $table->integer('experience_years')->default(0);
            $table->string('experience_image')->nullable();
            $table->text('experience_description_ar')->nullable();
            $table->text('experience_description_en')->nullable();
            $table->text('content_ar');
            $table->text('content_en');
            $table->json('features_ar')->nullable(); // Array of feature texts in Arabic
            $table->json('features_en')->nullable(); // Array of feature texts in English
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};

