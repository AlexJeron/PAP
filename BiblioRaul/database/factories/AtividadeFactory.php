<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atividade;
use Faker\Generator as Faker;

$factory->define(Atividade::class, function (Faker $faker) {
    return [
        'nome' => $faker->sentence,
        'user_id' => factory(\App\User::class),
        'local_id' => factory(\App\Local::class),
        'inicio' => $faker->dateTimeBetween($startDate = '-1 month', $endDate = '+2 months', $timezone = null),
        'fim' => $faker->dateTime,
        'observacao' => $faker->sentence,
    ];
});
