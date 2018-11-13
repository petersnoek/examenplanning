<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Company;
use League\Csv\Reader;
use League\Csv\Statement;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('companies') == false) {
            $this->command->warn("Seeding companies failed; table 'companies' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');

        $csv = Reader::createFromPath('database/csv/companies.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        //get all records starting from the 1st row
        $stmt = (new Statement())->offset(1);

        $records = $stmt->process($csv);
        foreach ($records as $record) {
            Company::create([
            'naam' => $record['bedrijfsnaam'],
            'straat' => $record['bezoek_adres'],
            'huisnummer' => $faker->numberBetween(1, 500),
            'toevoeging' => $faker->randomLetter,
            'postcode' => $faker->postcode,
            'plaats' => $record['bezoek_plaats'],
            'land' => $faker->country,
            'website' => 'https://www.google.nl',
            'sector' => $faker->word,
            ]);
        }
    }
}
