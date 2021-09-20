<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Debit;
use Faker\Generator as Faker;

$factory->define(Debit::class, function (Faker $faker) {
    return [
        'debit_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'refering_mounth' => $faker->month($max = 'now'),
        'obs' => $faker->text
    ];
});
