<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned();
			$table->integer('classe_id')->unsigned();
			$table->integer('subject_id')->unsigned();
			$table->integer('total');
			$table->string('slug');
			$table->timestamps();

				$table->foreign('student_id')
				->references('id')
				->on('students')
				->onDelete('cascade');

				$table->foreign('classe_id')
				->references('id')
				->on('classes')
				->onDelete('cascade');

				$table->foreign('subject_id')
				->references('id')
				->on('subjects')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grades');
	}

}
