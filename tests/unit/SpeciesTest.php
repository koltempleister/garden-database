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

    /**
     * @return mixed
     */
    public function createSpecies()
    {
        $species = factory('App\Species')->create();
        return $species;
    }

    /**
     * creates a child of $item
     *
     * @param $item
     * @return mixed
     */
    public function createChild($item)
    {
        return factory('App\Species')->create([
            'parent_id' => $item->id
        ]);
    }

    public function testChild()
    {
        $item = $this->createSpecies();

        //create child
        $child = $this->createChild($item);

        //get child
        $children = $item->children();

        //assert number of children and id of parent
        $this->assertEquals(count($children), 1);
        $this->assertEquals(
            $item->id,
            $children->first()->parent_id
        );
    }



    public function testController()
    {
        $this->visit('species')->assertResponseOk();
        $this->visit('species/create')->assertResponseOk();
    }

    /**
     * @test
     */
    public function it_can_have_multiple_children()
    {
        $species = $this->createSpecies();

        $child = $this->createChild($species);
        $child2 = $this->createChild($species);

        $descendants =$species->children()->get();

        $this->assertCount(2, $descendants);
    }

    /**
     * @test
     */
    public function it_can_get_all_descendants_in_one_go()
    {
    }

    /**
     * @test
     */
    public function it_can_have_multiple_seeds()
    {
        $species = $this->createSpecies();

        $count = 3;

        foreach (range(1,$count) as $index)
        {
            factory('App\Seed')->create([
                'species_id' => $species->id
            ]);
        }

        $seeds =  $species->seeds()->get();

        $this->assertCount($count, $seeds);
    }
}