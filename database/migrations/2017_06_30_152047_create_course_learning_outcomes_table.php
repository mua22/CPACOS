<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseLearningOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_learning_outcomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
        Schema::create('assessment_course_learning_outcome', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assessment_id')->unsigned();
            $table->integer('course_learning_outcome_id')->unsigned();

            //$table->primary(['assessment_id', 'course_learning_outcome_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('assessment_course_learning_outcome');
        Schema::table('course_learning_outcomes', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });
        Schema::dropIfExists('course_learning_outcomes');
    }
}
