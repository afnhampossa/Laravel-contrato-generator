<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DebitType;
use Faker\Generator as Faker;

$factory->define(DebitType::class, function (Faker $faker) {
    return [
        'debit_name' => $faker->name,
        'amount' => $faker->randomNumber(2)
    ];
});
