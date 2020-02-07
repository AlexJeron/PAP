<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Professor;
use Faker\Generator as Faker;

$factory->define(Professor::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ];
});