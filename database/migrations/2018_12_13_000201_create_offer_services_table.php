<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfferServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offer_services', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable();
			$table->integer('sort_order')->nullable();
			$table->text('content')->nullable();
			$table->text('header', 65535)->nullable();
			$table->string('image')->default('#');
			$table->string('link')->default('#');
			$table->timestamps();
			$table->integer('status');
			$table->string('heading')->nullable();
			$table->integer('heading_status')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offer_services');
	}

}
