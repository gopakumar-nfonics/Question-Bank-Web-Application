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
        Schema::create('tbl_question_config', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qc_subject_id');
            $table->unsignedBigInteger('qc_topic_id');
            $table->unsignedBigInteger('qc_difficulty_level');
            $table->integer('qc_no_of_questions');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('qc_subject_id')->references('id')->on('tbl_subjects')->onDelete('cascade');
            $table->foreign('qc_topic_id')->references('topic_id')->on('tbl_topics')->onDelete('cascade');
            $table->foreign('qc_difficulty_level')->references('id')->on('tbl_difficulty_level')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_question_config');
    }
};
