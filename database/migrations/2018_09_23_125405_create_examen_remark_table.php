<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenRemarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exam_remark', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opmerking_id');
            $table->increments('examen_id');

            $table->foreign('opmerking_id')
                ->references('id')->on('remarks')
                ->onDelete('cascade');
            $table->foreign('examen_id')
                ->references('id')->on('exams')
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
        Schema::table('examen_remark', function (Blueprint $table) {
            //
        });
    }
}
