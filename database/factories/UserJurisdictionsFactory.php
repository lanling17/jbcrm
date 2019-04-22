<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserJurisdictions::class, function (Faker $faker) {
	$date_time = $faker->date . ' ' . $faker->time;
    return [
        //
      'user_id' => rand(1,10),
	  'jurisdictions_id' => rand(1,35),
	  'created_at' => $date_time,
	  'updated_at' => $date_time,
    ];
});
