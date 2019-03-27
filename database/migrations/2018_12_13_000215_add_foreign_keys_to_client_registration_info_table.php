<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientRegistrationInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('client_registration_info', function(Blueprint $table)
		{
			$table->foreign('user_id', 'client_registration_info_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('client_registration_info', function(Blueprint $table)
		{
			$table->dropForeign('client_registration_info_ibfk_1');
		});
	}

}
