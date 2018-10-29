<?php

use App\Company;
use App\Questionaire;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('projects') == false) {
            $this->command->warn("Seeding projects failed; table 'projects' doesn't exist in database...");
            return;
        }

        $amount = 15;
        $faker = Faker::create('nl_NL');
        $companies = Company::inRandomOrder()->get();
        $questionaires = Questionaire::inRandomOrder()->get();


        foreach(range(1, $amount) as $index)
        {
            DB::table('projects')->insert([
                'naam' => $faker->sentence($faker->numberBetween(1,3)),
                'company_id' => $companies->pop()->id,
                'questionaire_id' => $questionaires->pop()->id,
                'created_at' => Carbon::now(),
            ]);
        }
        $this->command->info('Seeded ' . $amount . ' projects');
    }
}
