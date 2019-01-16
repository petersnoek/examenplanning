<?php

use App\Company;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Pivot_company_user_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('company_user') == false) {
            $this->command->warn("Seeding company_user failed; table 'company_user' doesn't exist in database...");
            return;
        }
        $faker = Faker::create('nl_NL');
        $bedrijfsleden = User::where('role_id', 4)->get();
        $companies = Company::all();

        foreach($bedrijfsleden as $bedrijfsuser)
        {
            $bedrijfsuser->companies()->attach([$companies->random()->id => ['bedrijfsrol'=>$faker->randomElement(['CEO', 'Bedrijfsleider', 'Werknemer', 'Recruiter', 'Coach', 'Manager', 'Assistent'])]]);
        }
    }
}
