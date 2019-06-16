<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAbsensiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('absensi', function(Blueprint $table)
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
		Schema::table('absensi', function(Blueprint $table)
		{
			$table->dropForeign('absensi_satpam_id_foreign');
			$table->dropForeign('absensi_user_id_foreign');
		});
	}

}
