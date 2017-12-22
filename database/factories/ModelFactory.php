<?php
$factory->define('App\Species', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'parent_id' => rand(1,3)
    ];
});

$factory->define('App\Seed', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'species_id' => factory('App\Species')->create()->id,
        'remarks' => $faker->sentence,
        'outside_from' => $faker->numberBetween(1, 36),
        'outside_till' => $faker->numberBetween(1, 36),
        'inside_from' => $faker->numberBetween(1, 36),
        'inside_till' => $faker->numberBetween(1, 36),
        'harvest_from' => $faker->numberBetween(1, 36),
        'harvest_till' => $faker->numberBetween(1, 36),
        'time_till_harvest' => $faker->numberBetween(),
        'row_distance_cm' => $faker->numberBetween(0, 100),
        'thin_out_cm' => $faker->numberBetween(0, 100),
        'plant_out_from' => $faker->numberBetween(1, 36),
        'plant_out_till' => $faker->numberBetween(1, 36),
        'replant_possible' => $faker->boolean()
    ];
});

$factory->define('App\Supplier', function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});


$factory->define('App\Stock_item', function (Faker\Generator $faker) {

    $statuses = [
        'besteld',
        'in voorraad',
        'niet meer in voorraad'
    ];

    $status = $statuses[random_int(0, 2)];

    return [
        'seed_id' => factory('App\Seed')->create()->id,
        'fresh_untill' => $faker->numberBetween(2014, 2020),
        'supplier_id' => factory('App\Supplier')->create()->id,
        'date_of_purchase' => $faker->date(),
        'status' => $status
    ];
});

$factory->define('App\Place', function (Faker\Generator $faker) {

    $locations = ['binnen', 'buiten'];
    $location = $locations[random_int(0, 1)];

    return [
        'name' => $faker->name,
        'location' => $location
    ];
});

$factory->define('App\Sowing', function (Faker\Generator $faker) {
    return [
        'stock_item_id' => factory('App\Sowing')->create()->id,
        'place_id' => factory('App\Place')->create()->id,
        'sow_date' => $faker->date(),
        'harvest_date' => $faker->date(),
        'year' => $faker->year(),
        'seed_id' => factory('App\Seed')->create()->id
    ];
});