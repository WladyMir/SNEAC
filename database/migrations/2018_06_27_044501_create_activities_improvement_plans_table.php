<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesImprovementPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_improvement_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activity')->nullable();
            $table->date('date')->nullable();
            $table->string('indicator')->nullable();
            $table->date('date_indicator')->nullable();
            $table->date('date_monitoring')->nullable();
            $table->string('detail_monitors')->nullable();
            $table->unsignedInteger('improvement_plan_id')->nullable();
            $table->foreign('improvement_plan_id')->references('id')->on('improvement_plans');
            $table->unsignedInteger('contributory_factor_by_report_id')->nullable();
            $table->unsignedInteger('status');//0=pendiente 1=listo
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
        Schema::dropIfExists('activities_improvement_plans');
    }
}
