<?php

use App\Project;
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
        $statusses = Status::inRandomOrder()->get();
        $projects = Project::inRandomOrder()->get();

        foreach($users = User::where('role_id',  3)->get() as $user)
        {
            $slotid = null;
            if($slots->isNotEmpty())
            {
                $slotid = $slots->pop()->id;
            }

            $count = 0;
            foreach($proevevanbekwaamheids = Proevevanbekwaamheid::all() as $proevevanbekwaamheid)
            {
                if($count == 2)
                {
                    $slotid = null;
                    if($slots->isNotEmpty())
                    {
                        $slotid = $slots->pop()->id;
                    }
                    $count = 0;
                }

                DB::table('exams')->insert([
                    'voorlopige_uitslag' => $faker->randomElement(array('n', 'o', 'v', 'g')),
                    'slot_id' => $slotid,
                    'proevevanbekwaamheid_id' => $proevevanbekwaamheid->id,
                    'status_id' => $statusses->random()->id,
                    'project_id' => $projects->random()->id,
                    'user_id' => $user->id,
                ]);

                $count++;
            }
        }
    }
}
