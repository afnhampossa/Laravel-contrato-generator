<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DebitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $x = 1;
        for($i=0; $i<=300; $i++){
            DB::table('debits')->insert([
                'debit_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'refering_mounth' => $faker->month($max = 'now'),
                'obs' => $faker->text, 
                'student_id' => $x,
                'debit_type_id' => 1
            ]);
            $x++;
        }       
    }
    }

