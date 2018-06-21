<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->bs,
        'description'=>$faker->realText(150),
        'image'=>$faker->word,
        'validated'=>null,
    ];
});
