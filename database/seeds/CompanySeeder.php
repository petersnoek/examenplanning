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
        $faker = Faker::create('nl_NL');

        $csv = Reader::createFromPath('database/csv/companies.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        //get all records starting from the 1st row
        $stmt = (new Statement())->offset(1);

        $records = $stmt->process($csv);
        foreach ($records as $record) {
            $c = new Company();
            $c->naam = $record['bedrijfsnaam'];
            $c->straat = $record['bezoek_adres'];
            $c->huisnummer = $faker->numberBetween(1, 500);
            $c->toevoeging = $faker->randomLetter;
            $c->postcode = $faker->postcode;
            $c->plaats = $record['bezoek_plaats'];
            $c->land = $faker->country;
            $c->website = 'https://www.google.nl';
            $c->sector = $faker->word;
            $c->created_at = Carbon::now();
            $c->save();
        }
    }
}
