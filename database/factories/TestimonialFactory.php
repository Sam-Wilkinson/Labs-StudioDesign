<?php

use Faker\Generator as Faker;

$factory->define(App\Testimonial::class, function (Faker $faker) {
    return [
        'content'=>$faker->sentence(20,30),
        'validated' => null,
    ];
});
