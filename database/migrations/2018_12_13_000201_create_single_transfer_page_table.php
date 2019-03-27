<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSingleTransferPageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('single_transfer_page', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('editor1');
			$table->text('editor2');
			$table->text('editor3');
			$table->text('editor4');
			$table->text('editor5');
			$table->text('editor6');
			$table->text('editor7');
			$table->text('editor8');
			$table->text('editor9');
			$table->text('editor10');
			$table->text('editor11');
			$table->text('editor12');
			$table->text('editor13');
			$table->text('featureHead');
			$table->binary('featureList');
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
		Schema::drop('single_transfer_page');
	}

}
