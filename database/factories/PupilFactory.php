<?php

use Faker\Generator as Faker;

$factory->define(App\Pupil::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        // assign the student a classroom. this value will reference the classroom table. 
        // there are 20 records in the classroom table, but this faker class below generates a number greater than 0 but less than 
        'classroom_id' => $faker->randomDigitNotNull,
        'pupilparent_id' => $faker->randomDigitNotNull,
        'remember_token' => str_random(10),
    ];
});
