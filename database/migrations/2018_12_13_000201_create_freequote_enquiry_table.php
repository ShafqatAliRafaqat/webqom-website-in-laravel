<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFreequoteEnquiryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('freequote_enquiry', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('service', 80)->nullable();
			$table->string('name', 80)->nullable();
			$table->string('email', 100)->nullable();
			$table->text('company', 65535)->nullable();
			$table->bigInteger('phone')->nullable();
			$table->string('website', 100)->nullable();
			$table->text('message', 65535)->nullable();
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
		Schema::drop('freequote_enquiry');
	}

}
