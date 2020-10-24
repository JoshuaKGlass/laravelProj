<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Illuminate\Support\Str; 
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'Title' => $faker->word,
        'Description' => $faker->paragraph
    ];
});
