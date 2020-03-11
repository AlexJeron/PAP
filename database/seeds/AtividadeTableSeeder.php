<?php

use Illuminate\Database\Seeder;

class AtividadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Atividade::class, 20)->create();
    }
}
