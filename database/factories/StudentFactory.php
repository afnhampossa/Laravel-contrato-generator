<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'level' => $faker->shuffle($array = array('10 Classe', '12 Classe')),
        'contacto' => $faker->e254PhoneNumber,
        'scholarship' => $faker->shuffle($array = array('SIM', 'NAO')),
        'scholarship_type' => $faker->shuffle($array = array('12.5%', '15%', '25%', '100%')),
        'obs' => $faker->text
    ];
});
