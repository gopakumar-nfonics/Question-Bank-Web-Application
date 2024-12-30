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
        Schema::create('tbl_question', function (Blueprint $table) {
            $table->id('qs_id'); // Primary key with 'qs_' prefix
            $table->string('qs_question'); // Field for the question with 'qs_' prefix
            //$table->unsignedBigInteger('qs_answer'); // Field for the answer with 'qs_' prefix
            $table->unsignedBigInteger('created_by'); // Field for created by user ID with 'qs_' prefix
            $table->timestamps(); // This will create 'qs_created_at' and 'qs_updated_at'

            // Add a foreign key constraint if you have a users table
            $table->foreign('created_by')->references('id')->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_question');
    }
};
