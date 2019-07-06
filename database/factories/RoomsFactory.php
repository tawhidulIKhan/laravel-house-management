<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Room::class, function (Faker $faker) {
    $houseId = \App\Models\House::all()->random()->id;
    return [
        'no' => $faker->numberBetween(100,500),
        'rent' => $faker->numberBetween(12000,30000),
        'house_id' => $houseId
    ];
});
