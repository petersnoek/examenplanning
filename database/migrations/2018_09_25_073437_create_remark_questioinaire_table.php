<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemarkQuestioinaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remark_questionaire', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('remark_id');
            $table->unsignedInteger('questionaire_id');

            $table->foreign('remark_id')
                ->references('id')->on('remarks')
                ->onDelete('cascade');
            $table->foreign('questionaire_id')
                ->references('id')->on('questionaires')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remark_questionaire', function (Blueprint $table) {

        });
    }
}
