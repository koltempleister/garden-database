<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSowingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sowings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('seed_id')->index('zaad_id');
			$table->integer('place_id');
			$table->date('date');
			$table->boolean('harvested');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sowings');
	}

}
