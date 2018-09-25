<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class SchoolyearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('schoolyears') == false) {
            $this->command->warn("Seeding schoolyears failed; table 'schoolyears' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        DB::table('schoolyears')->insert([
            'schooljaar' => '2018-2019',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '01-08-2018'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '31-06-2019'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('schoolyears')->insert([
            'schooljaar' => '2017-2018',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '01-08-2017'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '31-06-2018'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('schoolyears')->insert([
            'schooljaar' => '2016-2017',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '01-08-2016'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '31-06-2017'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('schoolyears')->insert([
            'schooljaar' => '2015-2016',
            'startdatum' => Carbon::createFromFormat('d-m-Y', '01-08-2015'),
            'einddatum' => Carbon::createFromFormat('d-m-Y', '31-06-2016'),
            'created_at' => Carbon::now(),
        ]);
    }
}
