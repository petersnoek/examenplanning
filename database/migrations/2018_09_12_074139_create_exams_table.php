<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('slot_id')->nullable();
            $table->unsignedInteger('proevevanbekwaamheid_id');
            $table->string('voorlopige_uitslag')->nullable();
            $table->timestamps();

            $table->foreign('slot_id')
                ->references('id')->on('slots')
                ->onDelete('cascade');
            $table->foreign('proevevanbekwaamheid_id')
                ->references('id')->on('proevevanbekwaamheids')
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
        Schema::dropIfExists('exams');
    }
}
