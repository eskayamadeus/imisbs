<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fee_amount');
            $table->integer('pupil_id')->unsigned()->nullable();
            $table->timestamps();
        });

             Schema::table('school_fees', function ($table) {
            $table->foreign('pupil_id')->references('id')->on('pupils')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('school_fees');
    }
}
