<?php

use App\Exam;
use App\Remark;
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

        $remarks = Remark::inRandomOrder()->get();
        $exams = Exam::inRandomOrder()->get();

        foreach($remarks as $remark)
        {
            DB::table('exam_remark')->insert([
                'remark_id' => $remark->id,
                'exam_id' => $exams->random()->id,
            ]);
        }
    }
}
