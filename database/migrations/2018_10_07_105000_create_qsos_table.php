<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateqsosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qsos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('callsign')->nullable();
            $table->float('frequency');
            $table->string('mode')->default("SSB");
            $table->string('operator')->nullable();
            $table->string('locator')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->longText('notes')->nullable();

            $table->integer('club_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('owner_club_id')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('qsos');
    }
}
