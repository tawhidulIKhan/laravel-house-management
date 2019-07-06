<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Media::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(config('enums.media_types')),
        'name' => $faker->word,
        'src' => 'images/dummy/sample/'.$faker->numberBetween(1,3).'.jpg',
        'description' => '',
        'path' => '',
        'mediable_id' => null,
        'mediable_type' => null
    ];
});
