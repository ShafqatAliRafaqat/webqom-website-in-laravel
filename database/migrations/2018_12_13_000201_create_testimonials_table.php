<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestimonialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testimonials', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('client_name')->nullable();
			$table->string('company')->nullable();
			$table->string('content', 500)->nullable();
			$table->string('service')->nullable();
			$table->string('client_image', 300)->nullable();
			$table->timestamps();
			$table->integer('status');
			$table->string('heading')->nullable();
			$table->integer('heading_status')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('testimonials');
	}

}
