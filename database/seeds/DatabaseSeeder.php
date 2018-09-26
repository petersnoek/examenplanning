<?php

use App\Questionaire;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['company_user', 'project_user', 'exam_user', 'exam_remark', 'users', 'roles', 'kwalificatiedossiers', 'proevevanbekwaamheids', 'statuses', 'schoolyears', 'periods', 'companies', 'slots', 'exams', 'questionaires', 'projects', 'remarks'];

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
            $this->command->info("Truncated table: " . $table);

        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        //model table seeders
        $this->call(KwalificatiedossierSeeder::class);
        $this->call(ProevevanbekwaamheidSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(SchoolyearSeeder::class);
        $this->call(PeriodSeeder::class);
        $this->call(SlotSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(QuestionaireSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ExamSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(RemarkSeeder::class);

        //pivottable seeders
        $this->call(Pivot_exam_user_Seeder::class);
        $this->call(Pivot_exam_remark_Seeder::class);
        $this->call(Pivot_project_user_Seeder::class);
        $this->call(Pivot_company_user_Seeder::class);

        Model::reguard();
    }
}
