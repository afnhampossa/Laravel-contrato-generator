<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DebitTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0; $i<8; $i++){
            DB::table('debit_types')->insert([
                'debit_name' => $faker->shuffle('Propina', 'Exame', 'Uniforme', 'Recorrencia', 'Inscricao', 'Certificado', 'Exame Especial', 'Caderneta'),
                'amount' => $faker->randomNumber(2),
                'start_charge_fine' => 5
            ]);
        }
            
        }
}
