<?php

use App\Role;
use Carbon\Carbon;
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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'voornaam' => $faker->firstName,
        'tussenvoegsel' => "van 't",
        'achternaam' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
        'telefoonnummer' => $faker->phoneNumber,
        'straat' => $faker->streetName,
        'huisnummer' => $faker->numberBetween(1, 500),
        'toevoeging' => $faker->randomLetter,
        'postcode' => $faker->postcode,
        'plaats' => $faker->city,
        'land' => $faker->country,
        'active' => $faker->boolean,
        'davinci_id' => 99 . $faker->randomNumber(6, true),
        'role_id' => Role::inRandomOrder()->first()->id,
        'remember_token' => str_random(10),
        'created_at' => Carbon::now(),
    ];
});
