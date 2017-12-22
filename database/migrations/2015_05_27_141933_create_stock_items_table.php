<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockItemsTable extends Migration {

	use \Illuminate\Foundation\Testing\DatabaseTransactions;
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_items', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('seed_id')->index('zaad_id');
			$table->integer('fresh_untill');
			$table->integer('supplier_id')->index('leverancier_id');
			$table->date('date_of_purchase');
			$table->enum('status', array('besteld','in voorraad','niet meer in voorraad'));

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
		Schema::drop('stock_items');
	}

}
