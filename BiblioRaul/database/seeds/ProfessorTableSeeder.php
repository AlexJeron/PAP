<?php

use Illuminate\Database\Seeder;

class ProfessorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professor')->insert([
            'nome' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
        ]);
    }
}