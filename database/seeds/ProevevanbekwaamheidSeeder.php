<?php

use App\Kwalificatiedossier;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProevevanbekwaamheidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('proevevanbekwaamheids') == false) {
            $this->command->warn("Seeding proevevanbekwaamheids failed; table 'proevevanbekwaamheids' doesn't exist in database...");
            return;
        }

        DB::table('proevevanbekwaamheids')->insert([
            'kerntaak' => 'B1-K1:  Levert een bijdrage aan het ontwikkeltraject',
            'werkproces' => 'B1-K1-W1:  Stelt de opdracht vast
                B1-K1-W2:  Levert een bijdrage aan het projectplan
                B1-K1-W3:  Levert een bijdrage aan het ontwerp
                B1-K1-W4:  Bereidt de realisatie voor',
            'kwalificatiedossier_id' => 1,
        ]);
        DB::table('proevevanbekwaamheids')->insert([
            'kerntaak' => 'B1-K2:  Realiseert en test (onderdelen van) een product',
            'werkproces' => 'B1-K2-W1:  Realiseert (onderdelen van) een product
                B1-K2-W2:  Test het ontwikkelde product',
            'kwalificatiedossier_id' => 1,
        ]);
        DB::table('proevevanbekwaamheids')->insert([
            'kerntaak' => 'B1-K3:  Levert een product op',
            'werkproces' => ' B1-K3-W1:  Optimaliseert het product
                B1-K3-W2:  Levert het product op
                B1-K3-W3:  Evalueert het opgeleverde product',
            'kwalificatiedossier_id' => 1,
        ]);
        DB::table('proevevanbekwaamheids')->insert([
            'kerntaak' => 'P1-K4:  Applicatie- en mediaontwikkelaar',
            'werkproces' => 'P1-K1:  Onderhoudt en beheert de applicatie
                P1-K1-W1:  Onderhoudt een applicatie
                P1-K1-W2:  Beheert gegevens',
            'kwalificatiedossier_id' => 1,
        ]);
    }
}
