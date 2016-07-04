<?php
$factory(
    'App\Species',
    [
        'name' => $faker->name,
        'parent' => 'factory:App\Species'
    ]
);

$factory(
    'App\Seed',
    [
        'name' => $faker->name,
        'species_id' => 'factory:App\Species',
        'remarks' => $faker->sentence,
        'outside_from' => $faker->randomFloat(0, 10),
        'outside_till' => $faker->randomFloat(0, 10),
        'inside_from' => $faker->randomFloat(0, 10),
        'inside_till' => $faker->randomFloat(0, 10),
        'harvest_from' => $faker->numberBetween(0, 10),
        'harvest_till' => $faker->numberBetween(0, 10),
        'time_till_harvest' => $faker->numberBetween(),
        'row_distance' => $faker->numberBetween(0, 100),
        'thin_out_cm' => $faker->numberBetween(0, 100),
        'plant_out_from' => $faker->randomFloat(0, 10),
        'plant_out_till' => $faker->randomFloat(0, 10),
        'replant_possible' => $faker->boolean()
    ]
);

$factory(
    'App\Supplier',
    [
        'name' => $faker->name
    ]
);



$factory(
    'App\StockItem',
    function($faker){

        $statuses = [
            'besteld',
            'in voorraad',
            'niet meer in voorraad'
        ];
        $status = $statuses[random_int(0,2)];

        return [
            'seed_id' => 'factory:App\species',
            'fresh_until' => $faker->numberBetween(2014,2020),
            'supplier_id' => 'factory:App\Supplier',
            'date_of_purchase' => $faker->year,
            'status' => $status
        ];
    )
);

$factory(
    'App\Place',
    function(){

        $locations = ['binnen', 'buiten'];
        $location = $locations[random_int(0,1)];

        return [
            'name' => $faker->name,
            'location' => $location
        ];
    }
);

$factory(
    'App\Sowing',
    [
        'stock_item_id' => 'factory:App\Sowing',
        'place_id' => 'factory:App\Place',
        'sow_date' => $faker->date(),
        'harvest_date' => $faker->date(),
        'year' => $faker->year(),
        'seed_id' => 'factory:App\Seed'
    ]
);