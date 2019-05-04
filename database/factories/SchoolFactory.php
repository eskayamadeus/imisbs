<?php

use Faker\Generator as Faker;

$factory->define(App\School::class, function (Faker $faker) {
    return [
        'name' => $faker->company, 
        'location' => $faker->city, 
        'region' => $faker->state, 
        'academic_year' =>$faker->year,
    ];
});
