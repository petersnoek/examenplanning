<?php

use App\Exam;
use App\Slot;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class Pivot_slot_user_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('slot_user') == false) {
            $this->command->warn("Seeding slot_user failed; table 'slot_user' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        $possibleExaminators = User::where('role_id', 2)->get();
        $possibleBedrijfsbegeleiders = User::where('role_id', 4)->get();

        $slots = Slot::inRandomOrder()->get();

        foreach($slots as $slot)
        {
            DB::table('slot_user')->insert([
                'user_role' => 'Examinator',
                'user_id' => $possibleExaminators->random()->id,
                'slot_id' => $slot->id,
            ]);
            DB::table('slot_user')->insert([
                'user_role' => 'Examinator',
                'user_id' => $possibleExaminators->random()->id,
                'slot_id' => $slot->id,
            ]);

            DB::table('slot_user')->insert([
                'user_role' => 'Bedrijfsbegeleider',
                'user_id' => $possibleBedrijfsbegeleiders->random()->id,
                'slot_id' => $slot->id,
            ]);
        }
    }
}
