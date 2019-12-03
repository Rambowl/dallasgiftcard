<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create(),
        'business_name' => $faker->name,
        'address_1' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip_code' => $faker->zip
    ];
});
