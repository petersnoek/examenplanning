<?php

use App\Exam;
use App\Project;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Pivot_project_user_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('project_user') == false) {
            $this->command->warn("Seeding project_user failed; table 'project_user' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');
        $users = User::where('role_id', 3)->inRandomOrder()->get();
        $projects = Project::inRandomOrder()->get();

        foreach($users as $user)
        {
            DB::table('project_user')->insert([
                'user_id' => $user->id,
                'project_id' => $projects->random()->id,
                'active' => true,
                'startdatum' => Carbon::now(),
            ]);
        }
    }
}
