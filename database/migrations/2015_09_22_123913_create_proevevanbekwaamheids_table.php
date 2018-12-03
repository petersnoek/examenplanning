<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProevevanbekwaamheidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proevevanbekwaamheids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kerntaak');
            $table->longText('werkproces');
            $table->unsignedInteger('kwalificatiedossier_id');
            $table->timestamps();

            $table->foreign('kwalificatiedossier_id')
                ->references('id')->on('kwalificatiedossiers')
                ->onDelete('cascade');
        });
        Schema::table('proevevanbekwaamheids', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proevevanbekwaamheids');
    }
}
