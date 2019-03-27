<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceFreeDomainsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_free_domains', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('page');
			$table->string('type')->nullable();
			$table->text('tlds', 65535)->nullable();
			$table->timestamps();
			$table->float('fee', 10, 0)->nullable();
			$table->integer('plan_id');
			$table->primary(['id','page']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_free_domains');
	}

}
