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
        Schema::rename('topics_tbl', 'tbl_topics');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('tbl_topics', 'topics_tbl');
    }
};
