<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'position'=>$faker->jobTitle,
        'company'=>$faker->company,
        'image'=> 'clientImage',
        'validated'=> null,
    ];
});
