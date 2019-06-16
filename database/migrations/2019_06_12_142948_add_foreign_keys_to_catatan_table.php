<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCatatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('catatan', function(Blueprint $table)
		{
			$table->foreign('satpam_id')->references('id')->on('satpam')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('catatan', function(Blueprint $table)
		{
			$table->dropForeign('catatan_satpam_id_foreign');
			$table->dropForeign('catatan_user_id_foreign');
		});
	}

}
