<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Kwalificatiedossier::class, function (Faker $faker) {
    return [
        'releasedatum' => $faker->date('d-m-Y', 'now'),
        'crebo' => $faker->randomNumber(5),
        'vanaf_cohort' => $faker->randomNumber() . '-' . $faker->randomNumber(),
    ];
});
