<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPenilaianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('penilaian', function(Blueprint $table)
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
		Schema::table('penilaian', function(Blueprint $table)
		{
			$table->dropForeign('penilaian_satpam_id_foreign');
			$table->dropForeign('penilaian_user_id_foreign');
		});
	}

}
