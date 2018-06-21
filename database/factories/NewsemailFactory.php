<?php

use Faker\Generator as Faker;

$factory->define(App\Newsemail::class, function (Faker $faker) {
    return [
        'email'=>$faker->email,
    ];
});
