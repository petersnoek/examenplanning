<?php

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

        foreach(factory(App\Kwalificatiedossier::class, 5)->create() as $kwalificatiedossier)
        {
            $this->command->info("Seeded crebo " . $kwalificatiedossier->crebo . " (uitgegeven op " . $kwalificatiedossier->releasedatum. ") vanaf cohort " . $kwalificatiedossier->vanaf_cohort);
        }
    }
}
