<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_menu',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sub_menu_title');
			$table->string('menu_description')->nullable();
			$table->integer('menu_id');
			$table->integer('position');
			$table->timestamps();

		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
