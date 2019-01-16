<?php

use App\Questionaire;
use App\Remark;
use Illuminate\Database\Seeder;

class Pivot_remark_questionaire_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('remark_questionaire') == false) {
            $this->command->warn("Seeding remark_questionaire failed; table 'remark_questionaire' doesn't exist in database...");
            return;
        }
        $ids = DB::table('exam_remark')->where('id' ,'>' ,0)->pluck('remark_id');
        $availableRemarks = Remark::whereNotIn('id', $ids)->get();
        $availableRemarks = $availableRemarks->shuffle();

        $questionaires = Questionaire::all();


        foreach($availableRemarks as $availableRemark)
        {
            DB::table('remark_questionaire')->insert([
                'questionaire_id' => $questionaires->random()->id,
                'remark_id' => $availableRemark->id,
            ]);
        }
    }
}
