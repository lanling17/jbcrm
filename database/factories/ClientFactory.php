<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Client::class, function (Faker $faker) {
    $date_time = $faker->date . ' ' . $faker->time;
    return [
      'name' => $faker->name,
      'sex' => rand(0,1),
      'classify_id' => rand(1,5),
      'email' => $faker->unique()->safeEmail,
      'phone' => $faker->unique()->phoneNumber,
      'age' => rand(20,80),
      'nature' => $faker->title,
      'wx_char' => $faker->word,
      'company' => $faker->companyPrefix,
      'position' => $faker->jobTitle,
      'contacts' => $faker->name,
      'important_grade' => rand(1,3),
      'out_lable' => $faker->safeColorName,
      'in_lable' => $faker->colorName,
      'cooperationing' => $faker->city,
      'cooperationed' => $faker->city,
      'scale' => $faker->country,
      'remarks' => $faker->catchPhrase,
      'created_id' => rand(1,10),
      'updated_id' => rand(1,10),
      'created_at' => $date_time,
      'updated_at' => $date_time,
    ];
});
