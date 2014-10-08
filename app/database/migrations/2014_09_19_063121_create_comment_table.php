<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('body');
			$table->integer('page_id');
			$table->string('user_name');
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
		Schema::table('comment',function(Blueprint $table)
		{
			Schema::drop('comment');
		});
	}

}
