<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCloudHostingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cloud_hosting', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('status');
			$table->string('title');
			$table->string('price');
			$table->string('sort_order');
			$table->string('promo');
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
		Schema::drop('cloud_hosting');
	}

}
