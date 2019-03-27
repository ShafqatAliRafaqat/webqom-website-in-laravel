<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_images', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('category_id');
			$table->string('image')->nullable();
			$table->string('banner')->nullable();
			$table->string('image_alt_text')->nullable();
			$table->date('image_start_date')->nullable();
			$table->date('image_end_date')->nullable();
			$table->string('pdf')->nullable();
			$table->string('url', 300)->nullable();
			$table->string('sort_order')->nullable();
			$table->timestamps();
			$table->integer('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_images');
	}

}
