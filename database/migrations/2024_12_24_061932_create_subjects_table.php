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
        Schema::create('subjects_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('sub_code')->unique(); // Subject code
            $table->string('sub_name'); // Subject name
            $table->unsignedBigInteger('created_by'); // User ID of the creator
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('tbl_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects_tbl');
    }
};
