<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
      // 'classify_id' => rand(1,5),
      'name' => $faker->name,
      'sex' => rand(0,1),
      'birthday' => $faker->date,
      'compony' => $faker->country,
      'position' => $faker->jobTitle,
      'email' => $faker->unique()->safeEmail,
      'telephone' => $faker->unique()->phoneNumber,
      'wx_char' => $faker->word,
      'area' => $faker->city,
      'address' => $faker->address,
      'industry' => $faker->title,
      'relation' => $faker->colorName,
      'cooperationing' => $faker->catchPhrase,
      'cooperationed' => $faker->catchPhrase,
      'remark' => $faker->catchPhrase,
      'created_id' => rand(1,10),
      'updated_id' => rand(1,10),
      'created_at' => $date_time,
      'updated_at' => $date_time,
    ];
});
