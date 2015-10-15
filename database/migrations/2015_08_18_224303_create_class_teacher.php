<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_teacher', function(Blueprint $table){
            $table->integer('classe_id')->unsigned()->index();
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');

            $table->integer('teacher_id')->unsigned()->index();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('classe_student', function(Blueprint $table){
            $table->integer('classe_id')->unsigned()->index();
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');

            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::drop('classe_teacher');
        Schema::drop('classe_student');
    }
}
