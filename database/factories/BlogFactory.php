<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    $categoriesCount = App\Category::all()->count();
    return [
        'name' => $faker->sentence(rand(4,15)),
        'description' =>$faker->sentence(rand(10,20)),
        'content' =>$faker->sentence(rand(30,50)),
        'validated'=> true,
        'categories_id' => $faker->numberBetween(1,$categoriesCount),
    ];
});
