<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('employeeId')->unique();
			$table->string('email');
			$table->integer('phone');
			$table->date('dob');
			$table->char('gender');
			$table->string('address');
			$table->string('state');
			$table->string('nationality');
			$table->string('type');
			$table->string('image');
			$table->string('slug');
			$table->timestamps();
			$table->timestamp('end_date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admins');
	}

}
