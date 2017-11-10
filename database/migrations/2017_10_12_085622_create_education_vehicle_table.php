<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('education_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->timestamps();

            $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicle')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_vehicle');
    }
}
