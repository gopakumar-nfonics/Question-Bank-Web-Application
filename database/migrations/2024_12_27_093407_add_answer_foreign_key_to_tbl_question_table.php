<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnswerForeignKeyToTblQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_question', function (Blueprint $table) {
            // Add the foreign key to reference the question_options table
            $table->unsignedBigInteger('qs_answer')->nullable()->after('qs_question'); // Field to store the answer (foreign key)

            // Foreign key relationship to the question_options table
            $table->foreign('qs_answer')->references('qo_id')->on('tbl_question_options')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_question', function (Blueprint $table) {
            $table->dropForeign(['qs_answer']);
            $table->dropColumn('qs_answer');
        });
    }
}
