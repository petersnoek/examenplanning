<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('users2') == false) {
            $this->command->warn("Seeding Users failed; table 'users' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        foreach(range(1,10) as $index) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
