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
        Schema::table('tbl_question', function (Blueprint $table) {
            $table->integer('qs_usage_count')->default(0)->after('qs_topic_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_question', function (Blueprint $table) {
            $table->dropColumn('qs_usage_count');
        });
    }
};
