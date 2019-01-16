<?php

use App\Company;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'naam' => $faker->company,
        'straat' => $faker->streetName,
        'huisnummer' => $faker->numberBetween(1, 500),
        'toevoeging' => $faker->randomLetter,
        'postcode' => $faker->postcode,
        'plaats' => $faker->city,
        'land' => $faker->country,
        'sector' => $faker->word,
        'website' => 'http://www.google.nl',
    ];
});
