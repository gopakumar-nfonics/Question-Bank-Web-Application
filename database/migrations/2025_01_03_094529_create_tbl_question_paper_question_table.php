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
        Schema::create('tbl_question_paper_question', function (Blueprint $table) {
            $table->id('qpq_id');
            $table->unsignedBigInteger('qpq_papper_id');
            $table->unsignedBigInteger('qpq_question_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('qpq_papper_id')->references('qp_id')->on('tbl_question_paper')->onDelete('cascade');
            $table->foreign('qpq_question_id')->references('qs_id')->on('tbl_question')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_question_paper_question');
    }
};
