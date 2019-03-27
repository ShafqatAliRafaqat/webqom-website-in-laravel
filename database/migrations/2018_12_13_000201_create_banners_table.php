<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('banner_title')->nullable();
			$table->string('banner_image');
			$table->string('banner_enlarge_image')->nullable();
			$table->string('banner_enlarge_pdf')->nullable();
			$table->string('banner_link')->nullable();
			$table->string('banner_alt')->nullable();
			$table->integer('banner_display_order');
			$table->string('banner_status')->default('active');
			$table->date('banner_start_date')->nullable();
			$table->date('banner_end_date')->nullable();
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
		Schema::drop('banners');
	}

}
