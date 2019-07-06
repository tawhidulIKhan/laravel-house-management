<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Renter::class, function (Faker $faker) {

    $user_id = \App\Models\User::whereHas('roles', function ($role){
        return $role->where('name', 'renter');
    })->get()->random()->id;

    return [
        'total_family_members' => $faker->numberBetween(2,10),
        'address' => $faker->address,
        'user_id' => $user_id
    ];
});
