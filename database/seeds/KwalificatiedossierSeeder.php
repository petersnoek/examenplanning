<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class KwalificatiedossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('kwalificatiedossiers') == false) {
            $this->command->warn("Seeding kwalificatiedossiers failed; table 'kwalificatiedossiers' doesn't exist in database...");
            return;
        }

        DB::table('kwalificatiedossiers')->insert([
            'releasedatum' => Carbon::createFromFormat('d-m-Y', '10-11-2015'),
            'crebo' => 25178,
            'vanaf_cohort' => '2015',
            'created_at' => Carbon::now(),
        ]);
    }
}
