<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('subject');
            // should i not remove this?
            $table->string('class');
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // extra proposed fields: phone, 
            // $table->integer('classroom_id')->unsigned()->nullable();
            // $table->string('role');
            // $table->string('phone_number');
            // $table->string('email');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff');
    }
}
