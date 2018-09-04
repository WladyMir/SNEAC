<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_responsables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('labor')->nullable();
            $table->string('position')->nullable();
            $table->unsignedInteger('activity_id')->nullable();
            $table->foreign('activity_id')->references('id')->on('activities_improvement_plans');
            $table->unsignedInteger('improvement_plan_id')->nullable();
            $table->foreign('improvement_plan_id')->references('id')->on('improvement_plans');
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
        Schema::dropIfExists('activity_responsables');
    }
}
