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
        Schema::create('tbl_question_options', function (Blueprint $table) {
            $table->id('qo_id'); // Primary key with 'qo_' prefix
            $table->unsignedBigInteger('qo_question_id'); // Foreign key to the tbl_question table
            $table->string('qo_options'); // Options field
            $table->unsignedBigInteger('qo_created_by'); // Created by user ID
            $table->timestamps(); // 'qo_created_at' and 'qo_updated_at'

            // Foreign key relationship with tbl_question
            $table->foreign('qo_question_id')->references('qs_id')->on('tbl_question')->onDelete('cascade');

            // Foreign key relationship with users table for created_by
            $table->foreign('qo_created_by')->references('id')->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_question_options');
    }
};
