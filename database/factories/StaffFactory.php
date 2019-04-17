<?php

use Faker\Generator as Faker;

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'subject' => $faker->word,
        'class' => $faker->word,
        'role' => $faker->jobTitle,
        'remember_token' => str_random(10),
    ];
});
