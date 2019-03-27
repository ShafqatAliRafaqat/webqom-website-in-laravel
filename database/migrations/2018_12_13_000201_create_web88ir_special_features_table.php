<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeb88irSpecialFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('web88ir_special_features', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('icon')->nullable();
			$table->string('page')->nullable();
			$table->string('icon_image', 300)->nullable();
			$table->timestamps();
			$table->integer('status')->nullable();
			$table->string('heading')->nullable();
			$table->text('sub_heading', 65535)->nullable();
			$table->text('content', 65535)->nullable();
			$table->integer('heading_status')->nullable();
			$table->boolean('ssl_page')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('web88ir_special_features');
	}

}
