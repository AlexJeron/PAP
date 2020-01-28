<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'nome' => 'Alexandre Jerónimo',
            'email' => 'alexandrejeronimo2001@gmail.com',
            'password' => '$2y$10$EGPmdQP4ezxlcEAYfHTQ0.0VhirIuqGKPjGHCzq/37i85esSB2Uue',
        ]);
    }
}