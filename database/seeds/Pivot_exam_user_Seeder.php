<?php

use App\Exam;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Pivot_exam_user_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('exam_user') == false) {
            $this->command->warn("Seeding exam_user failed; table 'exam_user' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');
        $amount = round(User::where('role_id',  3)->count() * 0.75);
        $users = User::where('role_id', 3)->inRandomOrder()->get();
        $exams = Exam::inRandomOrder()->get();

        foreach(range(1, $amount) as $index)
        {
            DB::table('exam_user')->insert([
                'user_role' => $faker->randomElement(['Examinator', 'Student', 'Bedrijfsbegeleider']),
                'user_id' => $users->pop()->id,
                'exam_id' => $exams->pop()->id,
            ]);
        }
    }
}
