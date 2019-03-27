<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientRegistrationInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_registration_info', function(Blueprint $table)
		{
			$table->string('client_id', 250)->unique('client_id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->string('first_name', 250);
			$table->string('last_name', 250);
			$table->string('company', 250);
			$table->string('address1', 250);
			$table->string('address2', 250);
			$table->integer('state_id');
			$table->integer('city_id');
			$table->integer('country_id');
			$table->integer('status');
			$table->string('phone_number', 250);
			$table->string('mobile_number', 250);
			$table->integer('news_letter');
			$table->enum('account_type', array('Individual Account','Business Account','',''));
			$table->string('postal_code', 250);
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
		Schema::drop('client_registration_info');
	}

}
