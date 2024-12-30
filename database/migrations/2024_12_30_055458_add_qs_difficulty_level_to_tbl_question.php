<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQsDifficultyLevelToTblQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_question', function (Blueprint $table) {
            $table->unsignedBigInteger('qs_difficulty_level')->nullable()->after('qs_answer'); // Replace 'some_column' with the column after which you want this field
            $table->foreign('qs_difficulty_level')->references('id')->on('tbl_difficulty_level')->onDelete('cascade');
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
            $table->dropForeign(['qs_difficulty_level']);
            $table->dropColumn('qs_difficulty_level');
        });
    }
}
