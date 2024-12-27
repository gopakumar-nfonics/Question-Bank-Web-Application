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
        Schema::table('tbl_subjects', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['sub_created_by']);

            // Rename the column
            $table->renameColumn('sub_created_by', 'created_by');

            // Re-add the foreign key constraint
            $table->foreign('created_by')
                ->references('id')
                ->on('tbl_users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_subjects', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['created_by']);

            // Rename the column back
            $table->renameColumn('created_by', 'sub_created_by');

            // Re-add the foreign key constraint
            $table->foreign('sub_created_by')
                ->references('id')
                ->on('tbl_users')
                ->onDelete('cascade');
        });
    }
};

