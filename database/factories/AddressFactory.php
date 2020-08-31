<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'name' => $faker->address,
        'floor' => $faker->numberBetween(0,10),
        'building' => $faker->buildingNumber,
        'street' => $faker->streetName,
        'city' => $faker->city,
        'region' => $faker->state,
        'country' => $faker->country
    ];
});
