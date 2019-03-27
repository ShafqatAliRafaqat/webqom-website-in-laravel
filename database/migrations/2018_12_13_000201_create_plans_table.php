<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_line1')->nullable();
			$table->string('name_line2')->nullable();
			$table->boolean('status')->nullable();
			$table->string('sort_order', 110)->nullable();
			$table->string('icon_image', 500)->nullable();
			$table->string('enable_plan_button')->nullable();
			$table->string('price_type')->nullable();
			$table->string('pricing_currency_other')->nullable();
			$table->string('pricing_currency')->nullable();
			$table->string('recurring_currency')->nullable();
			$table->string('recurring_currency_other')->nullable();
			$table->decimal('recurring_first_month', 20)->nullable();
			$table->decimal('recurring_first_year', 20)->nullable();
			$table->string('url')->nullable();
			$table->timestamps();
			$table->string('enable_plan_button_other', 300)->nullable();
			$table->decimal('setup_fee_one_time', 20)->nullable();
			$table->decimal('setup_fee_monthly', 20)->nullable();
			$table->decimal('price_one_time', 20)->nullable();
			$table->decimal('price_monthly', 20)->nullable();
			$table->decimal('setup_fee_annually', 20)->nullable();
			$table->decimal('setup_fee_biennially', 20)->nullable();
			$table->decimal('setup_fee_triennially', 20)->nullable();
			$table->decimal('price_annually', 20)->nullable();
			$table->decimal('price_biennially', 20)->nullable();
			$table->decimal('price_triennially', 20)->nullable();
			$table->string('plan_name')->nullable();
			$table->string('service_code')->nullable();
			$table->integer('category')->nullable();
			$table->string('promo_behaviour')->nullable();
			$table->string('promo_behaviour_other')->nullable();
			$table->integer('apply_gst')->nullable();
			$table->string('currency')->nullable();
			$table->float('currency_other', 10, 0)->nullable();
			$table->string('page');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plans');
	}

}
