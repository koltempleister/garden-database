<?php


class SeedsTest extends TestCase
{
   use \Illuminate\Foundation\Testing\DatabaseTransactions;

    public function testController()
    {
        $this->visit('seeds')->assertResponseOk();
        $this->visit('seeds/create')->assertResponseOk();
        $this->makeRequest(
            'POST',
            'seeds',
            [
                'name' => 'test',
                'parent_id' => '0'
            ])->assertResponseOk();

    }

    /**
     * @test
     */
    public function a_seed_is_persisted_in_db()
    {
        $seed = factory('App\Seed')->create();

        $this->seeInDatabase(
            'seeds',
            [
                'name' => $seed->name,
                'species_id' => $seed->species_id,
                'remarks' => $seed->remarks,
                'outside_from' => $seed->outside_from['value'],
                'outside_till' => $seed->outside_till['value'],
                'inside_from' => $seed->inside_from['value'],
                'inside_till' => $seed->inside_till['value'],
                'harvest_from' => $seed->harvest_from['value'],
                'harvest_till' => $seed->harvest_till['value'],
                'time_till_harvest' => $seed->time_till_harvest,
                'row_distance_cm' => $seed->row_distance_cm,
                'thin_out_cm' => $seed->thin_out_cm,
                'plant_out_from' => $seed->plant_out_from['value'],
                'plant_out_till' => $seed->plant_out_till['value'],
                'replant_possible' => $seed->replant_possible
            ]
        );
    }

    /**
     * @test
     */
    public function a_seed_belongs_to_a_species()
    {
        $seed = factory('App\Seed')->create();

        $species = $seed->species()->first(); //why does belongsTo return a collection??

        $this->assertEquals($seed->species_id, $species->id);
    }
}