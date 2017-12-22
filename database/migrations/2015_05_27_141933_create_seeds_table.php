<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seeds', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->unique('naam');
			$table->integer('species_id')->index('soorten_idx');
			$table->string('remarks')->nullable();
			$table->float('outside_from', 10, 0)->nullable();
			$table->float('outside_till', 10, 0)->nullable();
			$table->float('inside_from', 10, 0)->nullable();
			$table->float('inside_till', 10, 0)->nullable();
			$table->integer('harvest_from')->nullable();
			$table->integer('harvest_till')->nullable();
			$table->integer('time_till_harvest')->nullable();
			$table->integer('row_distance_cm')->nullable();
			$table->integer('thin_out_cm')->nullable();
			$table->integer('replant_possible')->nullable()->default(1);
			$table->float('plant_out_from', 10, 0)->nullable();
			$table->float('plant_out_till', 10, 0)->nullable();

            $table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seeds');
	}

}
