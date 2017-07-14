<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgramIdToProgramLearningOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_learning_outcomes', function (Blueprint $table) {
            $table->integer('program_id')->unsigned();

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_learning_outcomes', function (Blueprint $table) {
            $table->dropForeign(['program_id']);
        });
        Schema::table('program_learning_outcomes', function (Blueprint $table) {
            $table->dropColumn('program_id');
        });
    }
}
