<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campaign;
use App\User;
use Faker\Generator as Faker;

$factory->define(Campaign::class, function (Faker $faker) {
    return [
    	'business_id' => factory(Business::class)->create(),
        'title' => $faker->sentence,
        'description' => $faker->text,
        'type' => $faker->sentence,
    ];
});
