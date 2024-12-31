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
        Schema::create('tbl_difficulty_level', function (Blueprint $table) {
            $table->id();
            $table->string('difficulty_level'); // Field for difficulty level
            $table->unsignedBigInteger('created_by'); // Field for created by user ID
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_difficulty_level');
    }
};