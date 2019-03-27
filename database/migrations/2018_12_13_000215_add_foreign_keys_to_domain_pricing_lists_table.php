<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDomainPricingListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('domain_pricing_lists', function(Blueprint $table)
		{
			$table->foreign('domain_pricing_id', 'domain_pricing_id')->references('id')->on('domain_pricing')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('domain_pricing_lists', function(Blueprint $table)
		{
			$table->dropForeign('domain_pricing_id');
		});
	}

}
