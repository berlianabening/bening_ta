<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catatan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('satpam_id')->unsigned()->index('catatan_satpam_id_foreign');
			$table->integer('user_id')->unsigned()->index('catatan_user_id_foreign');
			$table->string('catatan', 191);
			$table->string('bulan', 191);
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
		Schema::drop('catatan');
	}

}
