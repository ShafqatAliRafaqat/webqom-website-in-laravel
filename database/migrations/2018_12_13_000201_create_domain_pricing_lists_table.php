<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainPricingListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domain_pricing_lists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('type', array('new','renewal','transfer'))->default('new');
			$table->string('country', 45);
			$table->string('tld', 45);
			$table->integer('domain_pricing_id')->unsigned()->index('domain_pricing_id_idx');
			$table->boolean('epp_code')->nullable();
			$table->string('addons')->nullable();
			$table->binary('pricing')->nullable();
			$table->boolean('status')->nullable();
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
		Schema::drop('domain_pricing_lists');
	}

}
