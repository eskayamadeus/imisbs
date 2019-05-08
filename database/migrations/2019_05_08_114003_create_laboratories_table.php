<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaboratoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dimension');
            // foreign key furniture and fixtures
            $table->integer('furniture_and_fixtures_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('laboratories', function ($table) {
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
        Schema::dropIfExists('laboratories');
    }
}
