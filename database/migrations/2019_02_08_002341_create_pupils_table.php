<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePupilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('pupils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // reference the student's class
            $table->integer('classroom_id')->unsigned()->nullable();
            // reference the pupil's parent
            $table->integer('pupilparent_id')->unsigned()->nullable();
            

            $table->rememberToken();
            $table->timestamps();

            // extra proposed fields: sex, address, 
        });

        Schema::table('pupils', function ($table) {
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            // optionally add ->onDelete('cascade') or onUpdate
            $table->foreign('pupilparent_id')->references('id')->on('pupilparents')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pupils');
    }
}
