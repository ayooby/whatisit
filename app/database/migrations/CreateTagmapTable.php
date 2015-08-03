<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagmapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tagmap', function($table)
		{
			$table->increments('id');
			$table->integer('question_id')->references('id')->on('questions');
			$table->integer('tag_id')->references('id')->on('tags');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tagmap');
	}

}
