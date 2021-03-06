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
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('voorlopige_uitslag')->nullable();
            $table->timestamps();

            $table->foreign('slot_id')
                ->references('id')->on('slots')
                ->onDelete('cascade');
            $table->foreign('proevevanbekwaamheid_id')
                ->references('id')->on('proevevanbekwaamheids')
                ->onDelete('cascade');
            $table->foreign('status_id')
                ->references('id')->on('statuses')
                ->onDelete('cascade');
            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('exams', function (Blueprint $table) {
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
        Schema::dropIfExists('slot_user');
        Schema::dropIfExists('exam_remark');
        Schema::dropIfExists('exams');
    }
}
