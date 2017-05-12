<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'rsvp_number' => $faker->unique()->numberBetween($min = 1000, $max = 9000),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'status' => 'unresponded'
    ];
});

$factory->define(App\Wedding::class, function (Faker\Generator $faker) {
    return [
    ];
});
