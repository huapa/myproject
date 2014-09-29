<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('page_title');
			$table->longtext('page_content');
			$table->integer('category_id');
			$table->integer('menu_id');
			$table->integer('sub_menu_id')->nullable();
			$table->string('path');
			$table->enum('home',array('on','off'));
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
		Schema::table('page',function(Blueprint $table)
		{
			Schema::drop('page');
		});
	}

}
