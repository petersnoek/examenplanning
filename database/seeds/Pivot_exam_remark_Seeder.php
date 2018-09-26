<?php

use App\Exam;
use App\Remark;
use App\User;
use Illuminate\Database\Seeder;

class Pivot_exam_remark_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('exam_remark') == false) {
            $this->command->warn("Seeding exam_remark failed; table 'exam_remark' doesn't exist in database...");
            return;
        }
        $amount = round(User::where('role_id',  3)->count() * 0.75);
        $remarks = Remark::inRandomOrder()->get();
        $exams = Exam::inRandomOrder()->get();

        foreach(range(1, $amount) as $index)
        {
            DB::table('exam_remark')->insert([
                'remark_id' => $remarks->pop()->id,
                'exam_id' => $exams->random()->id,
            ]);
        }
    }
}
