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
            $table->string('identificator')->unique()->nullable();
            $table->string('name_patient',50)->nullable();
            $table->string('rut',14);
            $table->unsignedInteger('age');
            $table->string('diagnostic',100);
            $table->date('event_date');
            $table->time('event_time');
            $table->unsignedInteger('occurrence_place_id')->nullable();
            $table->foreign('occurrence_place_id')->references('id')->on('places');
            $table->string('notifier_name',50)->nullable();
            $table->unsignedInteger('notifier_place_id');
            $table->foreign('notifier_place_id')->references('id')->on('places');
            $table->longText('description');
            $table->unsignedInteger('event_consequence');
            //0=sin lesión, 1=lesión leve,2= lesión moderada, 3= lesión grave, 4= muerte
            $table->unsignedInteger('clinical_record');
            //0 = si, 1 = no, 2 = se desconoce
            $table->unsignedInteger('classification_data_id')->nullable();
            $table->foreign('classification_data_id')->references('id')->on('classification_datas');
            $table->unsignedInteger('event_type');
            //0= sin clasificar, 1=incidente, 2=evento adverso, 3= evento centinela
            $table->unsignedInteger('event_status');
            //0=pendiente, 1=Realizando Analisis , 2 = Informe, 3= Plan de Mejora
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
