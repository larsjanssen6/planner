<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeletonGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peleton_group', function(Blueprint $table){
            $table->increments('id');
            $table->integer('peleton_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->timestamps();

            $table->foreign('peleton_id')->references('id')->on('peleton');
            $table->foreign('group_id')->references('id')->on('group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('peleton_group');
    }
}
