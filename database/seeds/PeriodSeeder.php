<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('periods') == false) {
            $this->command->warn("Seeding periods failed; table 'periods' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        DB::table('periods')->insert([
            'periodenaam' => 'periode 1',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '23-08-2018'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '01-02-2019'),
            'schoolyear_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        DB::table('periods')->insert([
            'periodenaam' => 'periode 2',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '04-02-2019'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '20-06-2019'),
            'schoolyear_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('periods')->insert([
            'periodenaam' => 'periode 1',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '23-08-2017'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '01-02-2018'),
            'schoolyear_id' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('periods')->insert([
            'periodenaam' => 'periode 2',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '04-02-2018'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '20-06-2018'),
            'schoolyear_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('periods')->insert([
            'periodenaam' => 'periode 1',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '23-08-2016'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '01-02-2017'),
            'schoolyear_id' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('periods')->insert([
            'periodenaam' => 'periode 2',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '04-02-2017'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '20-06-2017'),
            'schoolyear_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        DB::table('periods')->insert([
            'periodenaam' => 'periode 1',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '23-08-2015'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '01-02-2016'),
            'schoolyear_id' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('periods')->insert([
            'periodenaam' => 'periode 2',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '04-02-2016'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '20-06-2016'),
            'schoolyear_id' => 4,
            'created_at' => Carbon::now(),
        ]);

    }
}
