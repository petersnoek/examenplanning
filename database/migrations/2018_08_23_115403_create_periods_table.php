<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('schooljaar');
            $table->string('periodenaam');
            $table->date('startdatum');
            $table->date('einddatum');
            $table->timestamps();
            $table->unique(array('schooljaar', 'periodenaam'));
            //set composite key consisting of schooljaar periodenaam
//            $table->primary(['schooljaar', 'periodenaam']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
