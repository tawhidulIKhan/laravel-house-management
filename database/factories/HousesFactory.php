<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\House::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'address' => $faker->address,
        'owner_id' => auth()->id()
    ];
});
