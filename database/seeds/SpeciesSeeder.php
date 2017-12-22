<?php

use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,3) as $index)
        {
            App\Species::create(
                [
                    'name' => $faker->word,
                    'parent_id' => null
                ]
            );
        }
    }
}
