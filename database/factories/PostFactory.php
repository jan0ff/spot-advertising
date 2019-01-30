<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence(6),
      'description' =>  $faker->paragraph(),
      'is_headline' => '0',
      'user_id'     => 1

    ];
});
