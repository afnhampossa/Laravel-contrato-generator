<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
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
        for($i=0; $i<=100; $i++){
            if($x > 10){
                $x = 1;
            }            
            DB::table('students')->insert([
            'name' => $faker->name,
            'num_student' => $i,
            'level' => $faker->randomElement($array = array ('10','12')),
            'contacto' => $faker->e164PhoneNumber,
            'gender' => $faker->randomElement($array = array ('F','M')),
            'scholarship' => 0,
            'scholarship_type' => 'None',
            'last_school' => 'Escola Secundaria da Manga',
            'how_to_pay' => 'Mensalmente',
            'funding_source' => 'Pessoal',
            'name_of_carer' => $faker->name,
            'contact_of_carer' => $faker->e164PhoneNumber,
            'doc' => $faker->randomElement($array = array ('BI','DIRE')),
            'doc_number' => $faker->e164PhoneNumber,
            'provenance' => 'Mafambisse',
            'address' => 'Beira - Manga',
            'finish_year' => $faker->randomElement($array = array ('2012','2013', '2014', '2015', '2016')),
            'date_birth' =>  $faker->date($format = 'Y-m-d', $max = 'now'),
            'need_care' => $faker->randomElement($array = array ('SIM','NAO')),
            'courses_id' => $x            
        ]); 
        $x++;  
    }
        }
    }
