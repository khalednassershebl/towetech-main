<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // أولا أضف العمود بدون unique
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable();
        });

        // ثم حدّد slug لكل صف موجود
        DB::table('categories')->get()->each(function ($category) {
            $slug = Str::slug($category->name);
            DB::table('categories')->where('id', $category->id)->update(['slug' => $slug]);
        });

        // ثم اجعل العمود unique
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
