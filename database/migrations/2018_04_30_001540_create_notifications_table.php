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
            $table->string('event_type',20);
            $table->string('event_status',20);
            $table->date('event_date');
            $table->unsignedInteger('event_name_id')->nullable();
            $table->string('name_patient',30)->nullable();
            $table->foreign('event_name_id')->references('id')->on('events_names');
            $table->unsignedInteger('place_id')->nullable();
            $table->foreign('place_id')->references('id')->on('places');
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
