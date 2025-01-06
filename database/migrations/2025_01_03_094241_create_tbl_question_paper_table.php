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
        Schema::create('tbl_question_paper', function (Blueprint $table) {
            $table->id('qp_id');
            $table->string('qp_title');
            $table->string('qp_code')->unique();
            $table->unsignedBigInteger('qp_template');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('qp_template')->references('id')->on('tbl_question_template')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_question_paper');
    }
};
