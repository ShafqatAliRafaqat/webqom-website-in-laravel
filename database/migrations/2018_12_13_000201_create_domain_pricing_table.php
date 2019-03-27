<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainPricingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domain_pricing', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->boolean('status');
			$table->timestamps();
			$table->enum('type', array('single','Addons','bulk',''))->nullable()->default('single');
			$table->float('price', 10, 0)->nullable();
			$table->string('pricing_type')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('domain_pricing');
	}

}
