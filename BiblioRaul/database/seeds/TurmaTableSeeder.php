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
            ['nome' => '7º A'],
            ['nome' => '7º B'],
            ['nome' => '7º C'],
            ['nome' => '7º D'],
            ['nome' => '8º A'],
            ['nome' => '8º B'],
            ['nome' => '8º C'],
            ['nome' => '8º D'],
            ['nome' => '9º A'],
            ['nome' => '9º B'],
            ['nome' => '9º C'],
            ['nome' => '9º D'],
            ['nome' => '10º CT1'],
            ['nome' => '10º CT2'],
            ['nome' => '10º CT3'],
            ['nome' => '10º CS1'],
            ['nome' => '10º CS2'],
            ['nome' => '10º CS3'],
            ['nome' => '10º LH1'],
            ['nome' => '10º LH2'],
            ['nome' => '10º LH3'],
            ['nome' => '10º AV1'],
            ['nome' => '10º AV2'],
            ['nome' => '10º AV3'],
            ['nome' => '11º CT1'],
            ['nome' => '11º CT2'],
            ['nome' => '11º CT3'],
            ['nome' => '11º CS1'],
            ['nome' => '11º CS2'],
            ['nome' => '11º CS3'],
            ['nome' => '11º LH1'],
            ['nome' => '11º LH2'],
            ['nome' => '11º LH3'],
            ['nome' => '11º AV1'],
            ['nome' => '11º AV2'],
            ['nome' => '11º AV3'],
            ['nome' => '12º CT1'],
            ['nome' => '12º CT2'],
            ['nome' => '12º CT3'],
            ['nome' => '12º CS1'],
            ['nome' => '12º CS2'],
            ['nome' => '12º CS3'],
            ['nome' => '12º LH1'],
            ['nome' => '12º LH2'],
            ['nome' => '12º LH3'],
            ['nome' => '12º AV1'],
            ['nome' => '12º AV2'],
            ['nome' => '12º AV3'],
            ['nome' => '1º PSI'],
            ['nome' => '2º PSI'],
            ['nome' => '3º PSI'],
        ];

        DB::table('turma')->insert($turmas);
    }
}