<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraCurriculumActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_curriculum_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->integer('recreational_facilities_id')->unsigned()->nullable();
            $table->integer('pupils_id')->unsigned()->nullable();
            $table->integer('teachers_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('extra_curriculum_activities', function ($table) {
            $table->foreign('pupil_id')->references('id')->on('pupils')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('recreational_facilities_id')->references('id')->on('teaching_staffs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('teachers_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('extra_curriculum_activities');
    }
}
