<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWashroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('washrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dimension')->nullable();
            $table->string('type')->nullable();
            // foreign key furniture and fixtures
            $table->integer('furniture_and_fixtures_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('washrooms', function ($table) {
            $table->foreign('furniture_and_fixtures_id')->references('id')->on('furniture_and_fixtures')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('washrooms');
    }
}
