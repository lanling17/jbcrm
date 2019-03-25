<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserRole::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
      'user_id' => rand(1,10),
      'role_id' => rand(1,6),
      'created_at' => $date_time,
      'updated_at' => $date_time,
    ];
});
