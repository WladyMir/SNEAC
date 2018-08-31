<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImprovementPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('improvement_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objective');
            $table->string('scope');
            $table->unsignedInteger('user_id');
            $table->smallInteger('status');//0=Escribiendo 1=Ejecutando 2=Revisando 3=Listo
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('report_id');
            $table->foreign('report_id')->references('id')->on('reports');
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
        Schema::dropIfExists('improvement_plans');
    }
}
