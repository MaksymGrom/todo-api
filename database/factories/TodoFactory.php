<?php

use App\Todo\Model\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'text' => $faker->text(70),
        'completed' => $faker->boolean(20)
    ];
});
