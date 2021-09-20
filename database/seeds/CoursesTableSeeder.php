<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0; $i<=10; $i++){
            DB::table('courses')->insert([
            'courseName' => $faker->name,
            'duraction' => $faker->randomElement($array = array ('1','2','3')),
            'year' => $faker->year($max = 'now'),
            'course_type' => 'Nao Comercias',
            'monthly_payment' => $faker->randomNumber(2)
        ]);
        }    
    }
}
