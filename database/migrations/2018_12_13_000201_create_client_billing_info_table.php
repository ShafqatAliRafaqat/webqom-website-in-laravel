<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientBillingInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_billing_info', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->string('billing_first_name', 250)->nullable();
			$table->string('billing_last_name', 250)->nullable();
			$table->string('billing_address_1', 500)->nullable();
			$table->string('billing_address_2', 250)->nullable();
			$table->integer('billing_city_id')->nullable()->index('billing_city_id');
			$table->integer('billing_state_id')->nullable()->index('billing_state_id');
			$table->integer('billing_country_id')->nullable()->index('billing_country_id');
			$table->string('billing_postal_code', 256)->nullable();
			$table->string('billing_email', 250)->nullable();
			$table->string('billing_company', 250)->nullable();
			$table->string('billing_phone_number', 250)->nullable();
			$table->string('billing_mobile_number', 250)->nullable();
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
		Schema::drop('client_billing_info');
	}

}
