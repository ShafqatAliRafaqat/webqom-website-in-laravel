<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBulkDomainPricingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bulk_domain_pricing', function(Blueprint $table)
		{
			$table->integer('bdp_id', true);
			$table->integer('domain_pricing_id');
			$table->string('duration', 40);
			$table->string('addons');
			$table->string('year_sale_1', 20);
			$table->string('year_list_1', 20);
			$table->string('year_sale_2', 20);
			$table->string('year_list_2', 20);
			$table->string('year_sale_3', 20);
			$table->string('year_list_3', 20);
			$table->string('year_sale_4', 20);
			$table->string('year_list_4', 20);
			$table->string('year_sale_5', 20);
			$table->string('year_list_5', 20);
			$table->string('year_sale_6', 20);
			$table->string('year_list_6', 20);
			$table->string('year_sale_7', 20);
			$table->string('year_list_7', 20);
			$table->string('year_sale_8', 20);
			$table->string('year_list_8', 20);
			$table->string('year_sale_9', 20);
			$table->string('year_list_9', 20);
			$table->string('year_sale_10', 20);
			$table->string('year_list_10', 20);
			$table->integer('status');
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
		Schema::drop('bulk_domain_pricing');
	}

}
