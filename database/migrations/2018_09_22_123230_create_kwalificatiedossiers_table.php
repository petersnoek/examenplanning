<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKwalificatiedossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwalificatiedossiers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('releasedatum');
            $table->string('crebo')->unique();;
            $table->string('vanaf_cohort');
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
        Schema::dropIfExists('kwalificatiedossiers');
    }
}
