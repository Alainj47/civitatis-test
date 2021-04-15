<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Actividad::class, function (Faker $faker) {
    return [
        'titulo' => $faker->name,
        'fecha_desde' => date('Y-m-d'),
        'fecha_hasta' => date('Y-m-d'),
        'precio_persona' => $faker->randomDigit,
        'popularidad' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
