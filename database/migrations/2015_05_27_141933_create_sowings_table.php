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
			$table->integer('stock_item_id')->index('stock_item_id');
			$table->integer('place_id')->index('place_id');
			$table->date('sow_date')->nullable();
			$table->date('harvest_date')->nullable();
			$table->integer('year');
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
