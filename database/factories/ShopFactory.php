<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Shop;
use Faker\Generator as Faker;


$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'ceo' => $faker->name,
        'place' => $faker->streetAddress,
        'phone' => $faker->phoneNumber,
    ];
});
