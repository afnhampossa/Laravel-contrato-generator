<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'courseName' => $faker->name,
        'duraction' => $faker->shuffle($array = array('36 Meses', '6 Meses')),
        'year' => $faker->year($max = 'now'),
        'course_type' => $fake->jobTitle,
        'monthly_payment' => $fake->monthName($max = 'now'),
        'obs' => $fake->text
    ];
});
