<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'shop_id' => 1,
        'unit' => 'number',
        'unit_name' => 'Pice',
        'rate' => rand(8,20),
    ];
});
