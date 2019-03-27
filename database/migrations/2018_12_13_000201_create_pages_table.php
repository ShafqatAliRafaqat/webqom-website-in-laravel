<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->text('content')->nullable();
			$table->timestamps();
			$table->text('title', 65535)->nullable();
			$table->integer('publish')->nullable();
			$table->integer('category_id')->nullable();
			$table->text('left_header', 65535)->nullable();
			$table->text('left_content', 65535)->nullable();
			$table->text('right_header', 65535)->nullable();
			$table->text('right_content', 65535)->nullable();
			$table->text('temp')->nullable();
			$table->string('duplicate_from', 50)->nullable();
			$table->text('temp2')->nullable();
			$table->text('content2')->nullable();
			$table->integer('is_ecomerce_page')->default(0);
			$table->integer('is_ssl_page')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
