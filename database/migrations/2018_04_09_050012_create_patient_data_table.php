<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_patient',30)->nullable();
            $table->date('admission_date')->nullable();
            $table->string('rut',11);
            $table->string('gender',30);
            $table->string('patient_classification',30);
            $table->string('patient_type',30)->nullable();

            $table->unsignedInteger('place_id')->nullable();
            $table->foreign('place_id')->references('id')->on('places');

            $table->integer('bed')->nullable();
            $table->longText('observation');

            $table->unsignedInteger('consequence_id');
            $table->foreign('consequence_id')->references('id')->on('consequences');

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
        Schema::dropIfExists('patient_data');
    }
}
