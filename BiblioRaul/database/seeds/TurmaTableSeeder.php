<?php

use Illuminate\Database\Seeder;

class TurmaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turmas = [
            ['ano' => 7, 'nome' => 'A'],
            ['ano' => 7, 'nome' => 'B'],
            ['ano' => 7, 'nome' => 'C'],
            ['ano' => 7, 'nome' => 'D'],
            ['ano' => 8, 'nome' => 'A'],
            ['ano' => 8, 'nome' => 'B'],
            ['ano' => 8, 'nome' => 'C'],
            ['ano' => 8, 'nome' => 'D'],
            ['ano' => 9, 'nome' => 'A'],
            ['ano' => 9, 'nome' => 'B'],
            ['ano' => 9, 'nome' => 'C'],
            ['ano' => 9, 'nome' => 'D'],
            ['ano' => 10, 'nome' => 'CT1'],
            ['ano' => 10, 'nome' => 'CT2'],
            ['ano' => 10, 'nome' => 'CT3'],
            ['ano' => 10, 'nome' => 'CS1'],
            ['ano' => 10, 'nome' => 'CS2'],
            ['ano' => 10, 'nome' => 'CS3'],
            ['ano' => 10, 'nome' => 'LH1'],
            ['ano' => 10, 'nome' => 'LH2'],
            ['ano' => 10, 'nome' => 'LH3'],
            ['ano' => 10, 'nome' => 'AV1'],
            ['ano' => 10, 'nome' => 'AV2'],
            ['ano' => 10, 'nome' => 'AV3'],
            ['ano' => 11, 'nome' => 'CT1'],
            ['ano' => 11, 'nome' => 'CT2'],
            ['ano' => 11, 'nome' => 'CT3'],
            ['ano' => 11, 'nome' => 'CS1'],
            ['ano' => 11, 'nome' => 'CS2'],
            ['ano' => 11, 'nome' => 'CS3'],
            ['ano' => 11, 'nome' => 'LH1'],
            ['ano' => 11, 'nome' => 'LH2'],
            ['ano' => 11, 'nome' => 'LH3'],
            ['ano' => 11, 'nome' => 'AV1'],
            ['ano' => 11, 'nome' => 'AV2'],
            ['ano' => 11, 'nome' => 'AV3'],
            ['ano' => 12, 'nome' => 'CT1'],
            ['ano' => 12, 'nome' => 'CT2'],
            ['ano' => 12, 'nome' => 'CT3'],
            ['ano' => 12, 'nome' => 'CS1'],
            ['ano' => 12, 'nome' => 'CS2'],
            ['ano' => 12, 'nome' => 'CS3'],
            ['ano' => 12, 'nome' => 'LH1'],
            ['ano' => 12, 'nome' => 'LH2'],
            ['ano' => 12, 'nome' => 'LH3'],
            ['ano' => 12, 'nome' => 'AV1'],
            ['ano' => 12, 'nome' => 'AV2'],
            ['ano' => 12, 'nome' => 'AV3'],
            ['ano' => 1, 'nome' => 'PTGPSI'],
            ['ano' => 2, 'nome' => 'PTGPSI'],
            ['ano' => 3, 'nome' => 'PTGPSI'],
        ];

        DB::table('turma')->insert($turmas);
    }
}