<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_user', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('slot_id');
            $table->unsignedInteger('user_id');
            $table->string('user_role');

            $table->foreign('slot_id')
                ->references('id')->on('slots')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('slot_user', function (Blueprint $table) {
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
        Schema::table('slot_user', function (Blueprint $table) {
            //
        });
    }
}
