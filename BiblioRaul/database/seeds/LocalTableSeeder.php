<?php

use Illuminate\Database\Seeder;

class LocalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('local')->insert([
            'nome' => 'Sala 9',
            'espaco' => 30,
        ]);

    }
}