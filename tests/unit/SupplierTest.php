<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SupplierTest extends TestCase
{
    /**
     * @test
     */
    public function a_supplier_is_persisted_in_db()
    {
        $supplier = factory('App\Supplier')->create();

        $this->seeInDatabase(
            'suppliers',
            [
                'id' => $supplier->id,
                'name' => $supplier->name
            ]
        );
    }
}
