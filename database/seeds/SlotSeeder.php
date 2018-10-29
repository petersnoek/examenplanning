<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('slots') == false) {
            $this->command->warn("Seeding slots failed; table 'slots' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        $start = Carbon::createFromFormat('d-m-Y', '25-09-2018');
        foreach (range(1, 10) as $index) {
            DB::table('slots')->insert([
                'starttijd' => Carbon::createFromFormat('H:i', '14:00'),
                'eindtijd' => Carbon::createFromFormat('H:i', '15:30'),
                'datum' => $start->format('Y-m-d'),
                'period_id' => 1,
                'created_at' => Carbon::now(),
            ]);
            $start->addWeek();
        }
        $start = Carbon::createFromFormat('d-m-Y', '10-10-2018');
        foreach (range(1, 6) as $index) {
            DB::table('slots')->insert([
                'starttijd' => Carbon::createFromFormat('H:i', '10:00'),
                'eindtijd' => Carbon::createFromFormat('H:i', '12:00'),
                'datum' => $start->format('Y-m-d'),
                'period_id' => 1,
                'created_at' => Carbon::now(),
            ]);
            $start->addWeek();
        }


        $start = Carbon::createFromFormat('d-m-Y', '06-02-2019');
        foreach (range(1, 14) as $index) {
            DB::table('slots')->insert([
                'starttijd' => Carbon::createFromFormat('H:i', '12:00'),
                'eindtijd' => Carbon::createFromFormat('H:i', '13:30'),
                'datum' => $start->format('Y-m-d'),
                'period_id' => 2,
                'created_at' => Carbon::now(),
            ]);
            $start->addWeek();
        }
        $start = Carbon::createFromFormat('d-m-Y', '08-02-2019');
        foreach (range(1, 4) as $index) {
            DB::table('slots')->insert([
                'starttijd' => Carbon::createFromFormat('H:i', '09:00'),
                'eindtijd' => Carbon::createFromFormat('H:i', '11:00'),
                'datum' => $start->format('Y-m-d'),
                'period_id' => 2,
                'created_at' => Carbon::now(),
            ]);
            $start->addWeek();
        }
    }
}
