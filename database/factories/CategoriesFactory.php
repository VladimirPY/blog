<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'key' => $faker->text(5),
        'categories' => $faker->text(10),
    ];
});
