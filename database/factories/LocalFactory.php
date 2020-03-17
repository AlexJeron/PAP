<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Local;
use Faker\Generator as Faker;

$factory->define(Local::class, function (Faker $faker) {
    return [
        'nome' => $faker->city,
        'capacidade' => $faker->numberBetween($min = 5, $max = 90),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});