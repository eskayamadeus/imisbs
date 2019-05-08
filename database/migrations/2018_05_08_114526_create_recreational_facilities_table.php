<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecreationalFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recreational_facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recreational_type');
            $table->string('size_and_dimension');
            //$table->integer('furniture_and_fixtures_id')->unsigned()->nullable();
            //$table->integer('extra_curriculum_activities_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('recreational_facilities', function ($table) {
            //$table->foreign('furniture_and_fixtures_id')->references('id')->on('furniture_and_fixtures')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('extra_curriculum_activities_id')->references('id')->on('extra_curriculum_activities')->onUpdate('cascade')->onDelete('cascade');
            // optionally add ->onDelete('cascade') or onUpdate
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recreational_facilities');
    }
}
