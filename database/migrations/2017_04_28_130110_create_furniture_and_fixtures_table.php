<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFurnitureAndFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furniture_and_fixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->integer('number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('furniture_and_fixtures');
    }
}
