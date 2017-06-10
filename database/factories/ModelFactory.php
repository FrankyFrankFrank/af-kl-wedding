<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'status' => 'unresponded'
    ];
});

$factory->define(App\Wedding::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Party::class, function (Faker\Generator $faker) {
    return [
        "name" => "The McTesters",
        "rsvp_code" => $faker->numberBetween(1000, 9999)
    ];
});
