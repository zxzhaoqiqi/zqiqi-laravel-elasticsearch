<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Article::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1, 10),
        'title' => $faker->word(5),
        'description' => $faker->text,
        'keyword' => $faker->word(20),
        'thumb' => $faker->imageUrl(60, 60),
        'status' => random_int(0, 1)
    ];
});
