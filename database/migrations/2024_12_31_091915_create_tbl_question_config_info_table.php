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
        Schema::create('tbl_question_config_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qi_config_id');  // Reference to question_configs
            $table->unsignedBigInteger('qi_topic_id');
            $table->unsignedBigInteger('qi_difficulty_level');
            $table->integer('qi_no_of_questions');
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('qi_config_id')->references('id')->on('tbl_question_config')->onDelete('cascade');
            $table->foreign('qi_topic_id')->references('topic_id')->on('tbl_topics')->onDelete('cascade');
            $table->foreign('qi_difficulty_level')->references('id')->on('tbl_difficulty_level')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_question_config_info');
    }
};
