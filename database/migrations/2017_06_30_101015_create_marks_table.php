<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numbers')->default(0);
            $table->integer('assessment_id')->unsigned();;
            $table->integer('student_id')->unsigned();;
            $table->foreign('assessment_id')->references('id')->on('assessments');
            $table->foreign('student_id')->references('id')->on('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropForeign(['assessment_id']);
            $table->dropForeign(['student_id']);
        });
        //Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('marks');
        //Schema::enableForeignKeyConstraints();
    }
}
