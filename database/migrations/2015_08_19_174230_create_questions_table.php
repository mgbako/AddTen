<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('subject_id')->unsigned();
			$table->integer('teacher_id')->unsigned();
			$table->string('classe_id')->unsigned();
			$table->string('term');
			$table->text('question');
			$table->text('option1');
			$table->text('option2');
			$table->text('option3');
			$table->text('option4');
			$table->string('slug');
			$table->timestamps();

			$table->foreign('subject_id')
				->references('id')
				->on('subjects')
				->onDelete('cascade');

			$table->foreign('teacher_id')
				->references('id')
				->on('teachers');

			$table->foreign('classe_id')
				->references('id')
				->on('classes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
