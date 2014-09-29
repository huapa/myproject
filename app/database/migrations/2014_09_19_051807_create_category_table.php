<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('category_name');
			$table->string('category_description');
			$table->integer('position');
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
		Schema::table('categroy',function(Blueprint $table){
			Schema::drop('category');
		});
	}

}
