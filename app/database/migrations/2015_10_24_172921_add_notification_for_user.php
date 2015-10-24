<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotificationForUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications_user', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('question_id')->unsigned()->index();
			$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

			$table->integer('answer_id')->unsigned()->index();
			$table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');

			$table->boolean('is_read')->default(0);			
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
		Schema::drop('notifications_user');
	}

}
