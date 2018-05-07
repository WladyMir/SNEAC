<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributoryFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributory_factors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contributory_factor',80);
            $table->unsignedInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contributory_factors');
    }
}
