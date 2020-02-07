<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ProfessorTableSeeder::class);
        $this->call(TurmaTableSeeder::class);
        $this->call(LocalTableSeeder::class);
        $this->call(RecursoTableSeeder::class);
        $this->call(AtividadeTableSeeder::class);

        $turmas = App\Turma::all();
        App\Atividade::all()->each(function ($atividade) use ($turmas) {
            $atividade->turmas()->attach(
                $turmas->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        $professores = App\Professor::all();
        App\Atividade::all()->each(function ($atividade) use ($professores) {
            $atividade->professores()->attach(
                $professores->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}