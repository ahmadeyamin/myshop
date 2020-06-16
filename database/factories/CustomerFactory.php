<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'shop_id' => 1,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
    ];
});
