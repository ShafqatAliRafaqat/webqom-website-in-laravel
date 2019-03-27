<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('general_features', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->string('description');
			$table->string('icon');
			$table->string('page');
			$table->string('icon_image', 300);
			$table->timestamps();
			$table->integer('status');
			$table->string('heading');
			$table->integer('heading_status');
			$table->boolean('ssl_page')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('general_features');
	}

}
