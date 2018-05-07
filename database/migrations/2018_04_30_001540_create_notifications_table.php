<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('patient_datas_id');
            $table->foreign('patient_datas_id')->references('id')->on('patient_datas');
            $table->unsignedInteger('event_datas_id');
            $table->foreign('event_datas_id')->references('id')->on('event_datas');
            $table->unsignedInteger('origin_id')->nullable();;
            $table->foreign('origin_id')->references('id')->on('origins');
            $table->unsignedInteger('contributory_factor_id')->nullable();;
            $table->foreign('contributory_factor_id')->references('id')->on('contributory_factors');
            $table->string('event_type',20);
            $table->string('event_status',20);
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
        Schema::dropIfExists('notifications');
    }
}
