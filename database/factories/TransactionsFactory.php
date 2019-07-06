<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Transaction::class, function (Faker $faker) {

    $roomId = \App\Models\Room::all()->random()->id;

    return [
        'type' => $faker->randomElement(['gas_bill', 'electricity_bill', 'others']),
        'amount' => $faker->numberBetween(2000, 30000),
        'description' => $faker->text,
        'room_id' => $roomId
    ];
});
