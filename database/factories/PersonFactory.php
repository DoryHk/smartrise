<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'date_of_birth' => $faker->dateTime,
        'preferred_contact_method' => $faker->numberBetween(1,3),
        'gender' => $faker->word,
    ];
});
