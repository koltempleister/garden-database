<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StockItemsTest extends TestCase
{
    /**
     * @test
     */
    public function a_stock_item_is_persisted_in_db()
    {
        $stock_item = factory('App\Stock_item')->create();

        $this->seeInDatabase(
            'stock_items',
            [
                'id' => $stock_item->id,
                'seed_id' => $stock_item->seed_id,
                'fresh_untill' => $stock_item->fresh_untill,
                'supplier_id' => $stock_item->supplier_id,
                'date_of_purchase' => $stock_item->date_of_purchase,
                'status' => $stock_item->status
            ]
        );
    }
}
