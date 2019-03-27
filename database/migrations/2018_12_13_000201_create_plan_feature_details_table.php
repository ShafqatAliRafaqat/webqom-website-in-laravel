<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanFeatureDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plan_feature_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description');
			$table->boolean('status');
			$table->timestamps();
			$table->string('select_yes_no', 250)->nullable()->default('""');
			$table->integer('plan_feature_id')->nullable();
			$table->string('page', 250);
			$table->integer('plan_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plan_feature_details');
	}

}
