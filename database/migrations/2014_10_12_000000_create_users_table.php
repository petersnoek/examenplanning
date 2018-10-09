<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voornaam');
            $table->string('tussenvoegsel')->nullable();
            $table->string('achternaam');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefoonnummer');
            $table->string('straat');
            $table->integer('huisnummer');
            $table->string('toevoeging')->nullable();
            $table->string('postcode');
            $table->string('plaats');
            $table->string('land');
            $table->boolean('active')->default(false);
            $table->unsignedInteger('role_id');
            $table->string('davinci_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')->on('roles')
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
        Schema::dropIfExists('exam_user');
        Schema::dropIfExists('company_user');
        Schema::dropIfExists('project_user');
        Schema::dropIfExists('users');
    }
}
