<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentUserQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_user_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assessment_user_id')->unsigned();
            $table->integer('assessment_question_id')->unsigned();
            $table->text('value');
        });

        Schema::table('assessment_user_questions', function(Blueprint $table) {
            $table->foreign('assessment_user_id')->references('id')->on('assessment_users')->onDelete('cascade');
            $table->foreign('assessment_question_id')->references('id')->on('assessment_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assessment_user_questions', function(Blueprint $table) {
            $table->dropForeign(['assessment_user_id']);
            $table->dropForeign(['assessment_question_id']);
        });

        Schema::dropIfExists('assessment_user_questions');
    }
}
