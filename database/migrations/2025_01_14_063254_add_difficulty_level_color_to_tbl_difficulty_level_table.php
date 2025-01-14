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
        Schema::table('tbl_difficulty_level', function (Blueprint $table) {
            $table->string('difficulty_level_color', 20)->nullable()->after('difficulty_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_difficulty_level', function (Blueprint $table) {
            $table->dropColumn('difficulty_level_color');
        });
    }
};
