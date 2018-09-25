<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('roles') == false) {
            $this->command->warn("Seeding Roles failed; table 'roles' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        DB::table('roles')->insert([
            'naam' => 'Administrator',
        ]);
        $this->command->info("Seeded Role Administrator");

        DB::table('roles')->insert([
            'naam' => 'Examinator',
        ]);
        $this->command->info("Seeded Role Examinator");

        DB::table('roles')->insert([
            'naam' => 'Student',
        ]);
        $this->command->info("Seeded Role Student");

        DB::table('roles')->insert([
            'naam' => 'Bedrijf',
        ]);
        $this->command->info("Seeded Role Bedrijf");

        DB::table('roles')->insert([
            'naam' => 'Examencomissie',
        ]);
        $this->command->info("Seeded Role Examencomissie");
    }
}
