<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'name'=>$faker->bs,
        'description'=>$faker->realText(150),
        'logo'=> 'logo',
        'validated'=>null,
    ];
});
