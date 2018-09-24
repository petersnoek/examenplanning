<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bedrijfsnaam');         // CommPro B.V.
            $table->string('bezoek_adres')->nullable();         // Loevesteinlaan 11
            $table->string('bezoek_postcode')->nullable();      // 4390 PP
            $table->string('bezoek_plaats')->nullable();        // Gorinchem
            $table->string('bezoek_tel')->nullable();           // 0183584903
            $table->string('bezoek_website')->nullable();       // www.commpro.nl
            $table->string('sbb_leerbedrijf_id')->nullable();   // 100085480
            $table->string('historie_studenten')->nullable();   // Arija Saminapour (2018, afgebroken)
            $table->string('opmerkingen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
