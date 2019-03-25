<?php

use Faker\Generator as Faker;

$factory->define(App\Models\RoleJurisdiction::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
        //
        'role_id' => rand(1,6),
        'jurisdiction_id' => rand(1,35),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
