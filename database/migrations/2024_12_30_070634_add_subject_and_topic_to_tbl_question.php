<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubjectAndTopicToTblQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_question', function (Blueprint $table) {
            // Add the new fields
            $table->unsignedBigInteger('qs_subject_id')->nullable()->after('qs_difficulty_level');
            $table->unsignedBigInteger('qs_topic_id')->nullable()->after('qs_subject_id');

            // Add foreign key constraints
            $table->foreign('qs_subject_id')->references('id')->on('tbl_subjects')->onDelete('cascade');
            $table->foreign('qs_topic_id')->references('topic_id')->on('tbl_topics')->onDelete('cascade');
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
            // Drop foreign keys first
            $table->dropForeign(['qs_subject_id']);
            $table->dropForeign(['qs_topic_id']);

            // Drop columns
            $table->dropColumn(['qs_subject_id', 'qs_topic_id']);
        });
    }
}
