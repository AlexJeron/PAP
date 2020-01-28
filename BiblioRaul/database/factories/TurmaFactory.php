<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Turma;
use Faker\Generator as Faker;

$factory->define(Turma::class, function (Faker $faker) {
    return [
        'nome' => $faker->randomElement(['7ºA', '8ºA', '9ºA', '10ºCT2', '11ºCT2', '12ºCT2']),
    ];
});
