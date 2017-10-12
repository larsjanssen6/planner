<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function(Blueprint $table){
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();

            $table->string('name');
            $table->integer('duration');
            $table->integer('required_students');
            $table->integer('required_instructors');

            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('vehicle_id')->references('id')->on('vehicle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicle');
    }
}
