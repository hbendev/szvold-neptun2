<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'description' => $faker->sentence(20),
        'points' => $faker->randomDigitNotNull,
        'from' => $faker->dateTime(),
        'to' => $faker->dateTimeBetween('now', '+2 months'),
    ];
});
