<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('users') == false) {
            $this->command->warn("Seeding Users failed; table 'users' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        DB::table('users')->insert([
            'name' => 'Peter Snoek',
            'email' => 'psnoek@davinci.nl',
            'password' => bcrypt('Studentje1'),
        ]);
        $this->command->info("Seeded user Peter Snoek (psnoek@davinci.nl) with password 'Studentje1'");


        DB::table('users')->insert([
            'name' => 'Developer',
            'email' => 'dev@dev.com',
            'password' => bcrypt('password'),
        ]);
        $this->command->info("Seeded user Developer (dev@dev.com) with password 'password'");


        foreach(range(1,10) as $index) {
            $n = $faker->firstName() . ' ' . $faker->lastName() ;
            $e = '99'.$faker->randomNumber(6).'@mydavinci.nl';
            $p = 'password';
            DB::table('users')->insert([
                'name' => $n,
                'email' => $e,
                'password' => bcrypt($p),
            ]);
            $this->command->info("Seeded user " . $n . " (" . $e . ") with password '" . $p . "'");
        }

    }
}
