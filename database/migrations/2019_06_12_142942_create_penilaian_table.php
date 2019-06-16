<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenilaianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penilaian', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('penilaian_user_id_foreign');
			$table->integer('satpam_id')->unsigned()->index('penilaian_satpam_id_foreign');
			$table->string('c1', 191);
			$table->string('c2', 191);
			$table->string('c3', 191);
			$table->string('c4', 191);
			$table->string('c5', 191);
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
		Schema::drop('penilaian');
	}

}
