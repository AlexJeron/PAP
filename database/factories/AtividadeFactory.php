<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atividade;
use Faker\Generator as Faker;

$factory->define(Atividade::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween($startDate = '-1 month', $endDate = '+2 months', $timezone = null);
    $randomNum = $faker->numberBetween($min = 0, $max = 2);

    return [
        'nome' => $faker->sentence,
        'user_id' => factory(\App\User::class),
        'local_id' => factory(\App\Local::class),
        'recurso_id' => $faker->numberBetween($min = 1, $max = 2),
        'inicio' => $start,
        'fim' => $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').'+'.$randomNum.'days'),
        'total_espectadores' => $faker->numberBetween($min = 1, $max = 50),
        'outros_espectadores' => $faker->name,
        'num_recursos' => $faker->numberBetween($min = 1, $max = 30),
        'observacao' => $faker->sentence,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});