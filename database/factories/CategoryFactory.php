<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'key' => $faker->imageUrl(750, 300),
        'categories' => $faker->text(10),
    ];
});
