<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'label' => $faker->sentence(6)
    ];
});
