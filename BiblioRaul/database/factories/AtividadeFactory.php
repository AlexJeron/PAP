<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atividade;
use Faker\Generator as Faker;

$factory->define(Atividade::class, function (Faker $faker) {
    return [
        'nome' => $faker->sentence,
        'user_id' => factory(\App\User::class),
        'local_id' => factory(\App\Local::class),
        'recurso_id' => factory(\App\Recurso::class),
        'inicio' => $faker->dateTimeBetween($startDate = '-1 month', $endDate = '+2 months', $timezone = null),
        'fim' => $faker->dateTime,
        'total_espectadores' => $faker->numberBetween($min = 1, $max = 50),
        'outros_espectadores' => $faker->name,
        'num_recursos' => $faker->numberBetween($min = 1, $max = 50),
        'observacao' => $faker->sentence,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});