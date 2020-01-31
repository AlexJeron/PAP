<?php

use Illuminate\Database\Seeder;

class EspectadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('espectador')->insert([
            'nome' => 'Inês Santos 10º CTCS',
        ]);

        DB::table('espectador')->insert([
            'nome' => 'Pais',
        ]);
    }
}