<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Proevevanbekwaamheid;
use App\Slot;
use App\Status;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('exams') == false) {
            $this->command->warn("Seeding exams failed; table 'exams' doesn't exist in database...");
            return;
        }
        $faker = Faker::create('nl_NL');

        $slots = Slot::inRandomOrder()->get();

        foreach($users = User::where('role_id',  3)->get() as $user)
        {
            foreach($proevevanbekwaamheids = Proevevanbekwaamheid::all() as $proevevanbekwaamheid)
            {
                $slotid = null;
                if($slots->isNotEmpty())
                {
                    $slotid = $slots->pop()->id;
                }
                else{
                    $slotid = null;
                }
                DB::table('exams')->insert([
                    'voorlopige_uitslag' => $faker->randomElement(array('n', 'o', 'v', 'g')),
                    'slot_id' => $slotid,
                    'proevevanbekwaamheid_id' => $proevevanbekwaamheid->id,
                    'status_id' => Status::inRandomOrder()->first()->id,
                    'created_at' => Carbon::now(),
                ]);
            }
        }
    }
}