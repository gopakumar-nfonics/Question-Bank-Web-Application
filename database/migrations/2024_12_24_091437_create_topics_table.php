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
        Schema::create('topics_tbl', function (Blueprint $table) {
            $table->bigIncrements('topic_id'); // Primary key
            $table->string('topic_name'); // Topic name
            $table->unsignedBigInteger('subject_id'); // Foreign key to subjects table
            $table->unsignedBigInteger('created_by'); // User who created the topic
            $table->timestamps(); // created_at and updated_at timestamps

            // Define the foreign key constraints
            $table->foreign('subject_id')->references('id')->on('subjects_tbl')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics_tbl');
    }
};
