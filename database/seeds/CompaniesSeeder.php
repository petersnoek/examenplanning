<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;
use League\Csv\Statement;

class CompaniesSeeder extends Seeder
{

    public function run()
    {
        $csv = Reader::createFromPath('database/csv/companies.csv', 'r');
        $csv->setDelimiter(',');
        $csv->setEnclosure('"');
        $csv->setHeaderOffset(0); //set the CSV header offset

        //get all records starting from the 1st row
        $stmt = (new Statement())->offset(1);

        $records = $stmt->process($csv);
        foreach ($records as $record) {
            $c = new \App\Company();
            $c->bedrijfsnaam = $record['bedrijfsnaam'];
            $c->bezoek_adres = $record['bezoek_adres'];
            $c->bezoek_postcode = '1000 AA';
            $c->bezoek_plaats = $record['bezoek_plaats'];
            $c->bezoek_tel = '0000000000';
            $c->bezoek_website = 'www.google.nl';
            $c->sbb_leerbedrijf_id = '100000';
            $c->historie_studenten = $record['historie_studenten'];
            $c->opmerkingen = '';

            $c->save();
            $this->command->info(implode($record));

        }


    }
}
