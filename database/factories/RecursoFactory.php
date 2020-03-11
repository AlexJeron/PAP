<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recurso;
use Faker\Generator as Faker;

$factory->define(Recurso::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->colorName,
        'quantidade_total' => $faker->numberBetween($min = 5, $max = 30),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});