<?php

class SpeciesTest extends TestCase
{
    protected $item;

    use \Illuminate\Foundation\Testing\DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->item = factory('App\Species')->create();
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
            $this->item->id,
            $children->first()->parent_id
        );
    }

    public function createChild()
    {
        return factory('App\Species')->create([
            'parent_id' => $this->item->id
        ]);
    }

    public function testController()
    {
        $this->visit('species')->assertResponseOk();
        $this->visit('species/create')->assertResponseOk();

    }
}