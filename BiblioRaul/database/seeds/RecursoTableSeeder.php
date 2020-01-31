<?php

use Illuminate\Database\Seeder;

class RecursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recurso')->insert([
            'nome' => 'Tablet',
            'quantidade_total' => 20,
        ]);

    }
}