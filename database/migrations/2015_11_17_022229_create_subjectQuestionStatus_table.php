<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectQuestionStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjectQuestionStatus', function(Blueprint $table){
            $table->integer('classe_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('time');
            $table->integer('progress');

            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

            $table->primary(['classe_id', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subjectQuestionStatus');
    }
}
