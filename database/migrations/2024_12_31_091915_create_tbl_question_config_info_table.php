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
        Schema::create('tbl_question_template_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qd_template_id');// Reference to question_configs
            $table->unsignedBigInteger('qd_subject_id');  
            $table->unsignedBigInteger('qd_topic_id');
            $table->unsignedBigInteger('qd_difficulty_level');
            $table->integer('qd_no_of_questions');
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('qd_template_id')->references('id')->on('tbl_question_template')->onDelete('cascade');
            $table->foreign('qd_subject_id')->references('id')->on('tbl_subjects')->onDelete('cascade');
            $table->foreign('qd_topic_id')->references('topic_id')->on('tbl_topics')->onDelete('cascade');
            $table->foreign('qd_difficulty_level')->references('id')->on('tbl_difficulty_level')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_question_template_details');
    }
};
