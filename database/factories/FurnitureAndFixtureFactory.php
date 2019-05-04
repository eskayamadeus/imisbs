<?php

use Faker\Generator as Faker;

$factory->define(App\Furniture_and_fixture::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => $faker->word,
        'number' => $faker->randomDigitNotNull,
    ];
});
