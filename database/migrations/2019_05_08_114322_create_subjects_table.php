<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject_name');
            $table->integer('pupil_id')->unsigned()->nullable();
            $table->integer('teaching_staff_id')->unsigned()->nullable();
            $table->integer('classroom_id')->unsigned()->nullable();
            $table->timestamps();
        });

          Schema::table('subjects', function ($table) {
            $table->foreign('pupil_id')->references('id')->on('pupils')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teaching_staff_id')->references('id')->on('teaching_staffs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('subjects');
    }
}
