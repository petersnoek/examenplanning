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
        $amountOfStudents = User::where('role_id', 3)->count();
        $studentsToGenerate = User::where('role_id', 3)->inRandomOrder()->take(round($amountOfStudents * 0.75))->get();

        $possibleExaminators = User::where('role_id', 2)->get();
        $possibleBedrijfsbegeleiders = User::where('role_id', 4)->get();

        $exams = Exam::where('slot_id', '!=', null )->inRandomOrder()->get();

        foreach($studentsToGenerate as $student)
        {
            $exam_id = $exams->pop()->id;

            DB::table('exam_user')->insert([
                'user_role' => 'Student',
                'user_id' => $student->id,
                'exam_id' => $exam_id,
            ]);

            DB::table('exam_user')->insert([
                'user_role' => 'Examinator',
                'user_id' => $possibleExaminators->random()->id,
                'exam_id' => $exam_id,
            ]);
            DB::table('exam_user')->insert([
                'user_role' => 'Examinator',
                'user_id' => $possibleExaminators->random()->id,
                'exam_id' => $exam_id,
            ]);

            DB::table('exam_user')->insert([
                'user_role' => 'Bedrijfsbegeleider',
                'user_id' => $possibleBedrijfsbegeleiders->random()->id,
                'exam_id' => $exam_id,
            ]);
        }
    }
}
