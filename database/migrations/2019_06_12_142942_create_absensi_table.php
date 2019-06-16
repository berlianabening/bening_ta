<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbsensiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('absensi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('absensi_user_id_foreign');
			$table->integer('satpam_id')->unsigned()->index('absensi_satpam_id_foreign');
			$table->string('h', 191);
			$table->string('i', 191);
			$table->string('a', 191);
			$table->string('total', 191);
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
		Schema::drop('absensi');
	}

}
