<?php

use App\Proevevanbekwaamheid;
use App\Slot;
use App\Status;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    $slots = Slot::all();
    $proevevanbekwaamheids = Proevevanbekwaamheid::all();

    return [
        'voorlopige_uitslag' => $faker->company,
        'slot_id' => $faker->company,
        'proevevanbekwaamheid_id' => $faker->company,
        'status_id' => Status::inRandomOrder()->first()->id,
        'created_at' => Carbon::now(),
    ];
});
