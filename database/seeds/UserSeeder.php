<?php

use Carbon\Carbon;
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
        $amount = 200;


        if (Schema::hasTable('users') == false) {
            $this->command->warn("Seeding Users failed; table 'users' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        DB::table('users')->insert([
            'voornaam' => 'Peter',
            'tussenvoegsel' => "",
            'achternaam' => 'Snoek',
            'email' => 'psnoek@davinci.nl',
            'password' => bcrypt('Studentje1'),
            'telefoonnummer' => $faker->phoneNumber,
            'straat' => $faker->streetName,
            'huisnummer' => $faker->numberBetween(1, 500),
            'toevoeging' => $faker->randomLetter,
            'postcode' => $faker->postcode,
            'plaats' => $faker->city,
            'land' => $faker->country,
            'active' => true,
            'davinci_id' => 99 . $faker->randomNumber(6, true),
            'role_id' => 1,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
        ]);
        $this->command->info("Seeded user Peter Snoek (psnoek@davinci.nl) with password 'Studentje1'");



        DB::table('users')->insert([
            'voornaam' => 'Dev',
            'tussenvoegsel' => "",
            'achternaam' => 'Dev',
            'email' => 'dev@dev.com',
            'password' => bcrypt('password'),
            'telefoonnummer' => $faker->phoneNumber,
            'straat' => $faker->streetName,
            'huisnummer' => $faker->numberBetween(1, 500),
            'toevoeging' => $faker->randomLetter,
            'postcode' => $faker->postcode,
            'plaats' => $faker->city,
            'land' => $faker->country,
            'active' => true,
            'davinci_id' => 99 . $faker->randomNumber(6, true),
            'role_id' => 1,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
        ]);
        $this->command->info("Seeded user Developer (dev@dev.com) with password 'password'");

        DB::table('users')->insert([
            'voornaam' => 'Student',
            'tussenvoegsel' => "",
            'achternaam' => 'Student',
            'email' => 'student@mail.com',
            'password' => bcrypt('student'),
            'telefoonnummer' => $faker->phoneNumber,
            'straat' => $faker->streetName,
            'huisnummer' => $faker->numberBetween(1, 500),
            'toevoeging' => $faker->randomLetter,
            'postcode' => $faker->postcode,
            'plaats' => $faker->city,
            'land' => $faker->country,
            'active' => true,
            'davinci_id' => 99 . $faker->randomNumber(6, true),
            'role_id' => 3,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
        ]);
        $this->command->info("Seeded student student (student@mail.com) with password 'student'");

        DB::table('users')->insert([
            'voornaam' => 'examinator',
            'tussenvoegsel' => "",
            'achternaam' => 'examinator',
            'email' => 'examinator@mail.com',
            'password' => bcrypt('examinator'),
            'telefoonnummer' => $faker->phoneNumber,
            'straat' => $faker->streetName,
            'huisnummer' => $faker->numberBetween(1, 500),
            'toevoeging' => $faker->randomLetter,
            'postcode' => $faker->postcode,
            'plaats' => $faker->city,
            'land' => $faker->country,
            'active' => true,
            'davinci_id' => 99 . $faker->randomNumber(6, true),
            'role_id' => 2,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
        ]);
        $this->command->info("Seeded examinator examinator (examinator@mail.com) with password 'examinator'");

        DB::table('users')->insert([
            'voornaam' => 'bedrijf',
            'tussenvoegsel' => "",
            'achternaam' => 'bedrijf',
            'email' => 'bedrijf@mail.com',
            'password' => bcrypt('bedrijf'),
            'telefoonnummer' => $faker->phoneNumber,
            'straat' => $faker->streetName,
            'huisnummer' => $faker->numberBetween(1, 500),
            'toevoeging' => $faker->randomLetter,
            'postcode' => $faker->postcode,
            'plaats' => $faker->city,
            'land' => $faker->country,
            'active' => true,
            'davinci_id' => 99 . $faker->randomNumber(6, true),
            'role_id' => 4,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
        ]);
        $this->command->info("Seeded bedrijf bedrijf (bedrijf@mail.com) with password 'bedrijf'");

        DB::table('users')->insert([
            'voornaam' => 'examencomissie',
            'tussenvoegsel' => "",
            'achternaam' => 'examencomissie',
            'email' => 'examencomissie@mail.com',
            'password' => bcrypt('examencomissie'),
            'telefoonnummer' => $faker->phoneNumber,
            'straat' => $faker->streetName,
            'huisnummer' => $faker->numberBetween(1, 500),
            'toevoeging' => $faker->randomLetter,
            'postcode' => $faker->postcode,
            'plaats' => $faker->city,
            'land' => $faker->country,
            'active' => true,
            'davinci_id' => 99 . $faker->randomNumber(6, true),
            'role_id' => 5,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
        ]);
        $this->command->info("Seeded examencomissie examencomissie (examencomissie@mail.com) with password 'examencomissie'");

        factory(App\User::class, $amount)->create();
        $this->command->info('Seeded ' . $amount . ' users');

//        foreach(range(1,10) as $index) {
//            $n = $faker->firstName() . ' ' . $faker->lastName() ;
//            $e = '99'.$faker->randomNumber(6).'@mydavinci.nl';
//            $p = 'password';
//            DB::table('users')->insert([
//                'name' => $n,
//                'email' => $e,
//                'password' => bcrypt($p),
//            ]);
//            $this->command->info("Seeded user " . $n . " (" . $e . ") with password '" . $p . "'");
//        }

    }
}
