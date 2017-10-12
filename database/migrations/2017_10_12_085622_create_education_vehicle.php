<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_vehicle', function(Blueprint $table){
            $table->increments('id');
            $table->integer('education_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();

            $table->foreign('education_id')->references('id')->on('education');
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
        Schema::drop('education_vehicle');
    }
}
