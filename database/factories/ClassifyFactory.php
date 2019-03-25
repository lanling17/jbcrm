<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Classify::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        'name' => $faker->country,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
