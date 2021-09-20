<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'acardoso',
            'email' => 'buda.cardoso@gmail.com',
            'user_type' => 'Administrador',
            'password' => bcrypt('password')
        ]);
    }
}
