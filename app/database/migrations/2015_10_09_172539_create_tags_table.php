<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags',function ($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
		Schema::create('question_tag',function ($table)
		{
			//$table->increments('id');
			$table->integer('question_id')->unsigned()->index();
			$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
			$table->timestamps();
		});

		Schema::create('user_tag',function ($table)
		{
			//$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
		Schema::drop(array('tags','question_tag','user_tag'));
	}

}
