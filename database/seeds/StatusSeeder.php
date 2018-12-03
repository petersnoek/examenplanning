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
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Examinator afwezig',
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Bedrijfsbegeleider afwezig',
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Uitgesteld',
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Vergeten',
        ]);
        DB::table('statuses')->insert([
            'naam' => 'Afgerond',
        ]);
    }
}
