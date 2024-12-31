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
            $table->integer('qc_no_of_questions');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('qc_subject_id')->references('id')->on('tbl_subjects')->onDelete('cascade');
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
