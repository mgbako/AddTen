<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('teacherId')->unique();
			$table->string('email')->uniqid();
			$table->integer('phone');
			$table->date('dob');
			$table->char('gender');
			$table->string('address');
			$table->string('state');
			$table->string('nationality');
			$table->string('type');
			$table->string('image');
			$table->timestamps();
			$table->timestamp('end_date');
			$table->string('slug');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers');
	}

}
