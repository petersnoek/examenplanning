<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('statuses') == false) {
            $this->command->warn("Seeding statuses failed; table 'statuses' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        DB::table('statuses')->insert([
            'naam' => 'Student afwezig',
            'created_at' => Carbon::now(),
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Examinator afwezig',
            'created_at' => Carbon::now(),
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Bedrijfsbegeleider afwezig',
            'created_at' => Carbon::now(),
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Uitgesteld',
            'created_at' => Carbon::now(),
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Vergeten',
            'created_at' => Carbon::now(),
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Afgerond',
            'created_at' => Carbon::now(),
        ]);
    }
}
