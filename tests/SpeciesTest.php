<?php

use Laracasts\TestDummy\DbTestCase;

class SpeciesTest extends DbTestCase
{
    protected $item;

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
        $this->item = \Faker\Factory::create('App\Species');
    }

    public function testChild()
    {
        //create child
        $child = $this->createChild();
        
        //get child
        $children = $this->item->children();

        //assert number of children and id of parent
        $this->assertEquals(count($children), 1);
        $this->assertEquals(
            $children->first()->parent()->id,
            $this->item_id
        );

        //assert if child has parent_id
        $this->assertEquals(
            $child->parent()->id,
            $this->item->id
        );
    }

    public function createChild()
    {
        $child = new App\Species(
            [
                'name' => 'test',
                'parent_id' => $this->item->id
            ]
        );

        $child->create();

        return $child;
    }
}