<?php

use Faker\Generator as Faker;

$factory->define(App\Pupil::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'class' => $faker->randomDigitNotNull,
        'remember_token' => str_random(10),
    ];
});
