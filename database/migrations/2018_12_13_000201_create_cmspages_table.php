<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCmspagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cmspages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('slug')->nullable()->unique('pages_slug_unique');
			$table->string('meta_title', 100)->nullable();
			$table->string('meta_keywords')->nullable();
			$table->text('meta_description', 65535)->nullable();
			$table->text('content', 65535)->nullable();
			$table->text('attributes', 65535)->nullable();
			$table->text('view', 65535)->nullable();
			$table->timestamps();
			$table->dateTime('publish_at')->nullable();
			$table->dateTime('unpublish_at')->nullable();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cmspages');
	}

}
