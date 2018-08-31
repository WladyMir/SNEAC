<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('event_date');
            $table->time('event_time');
            $table->unsignedInteger('classification_id')->nullable();
            $table->foreign('classification_id')->references('id')->on('classifications');

            $table->unsignedInteger('event_name_id')->nullable();
            $table->foreign('event_name_id')->references('id')->on('events_names');

            $table->unsignedInteger('details_id')->nullable();
            $table->foreign('details_id')->references('id')->on('details');

            $table->string('detail_text',100)->nullable();

            $table->unsignedInteger('place_id')->nullable();
            $table->foreign('place_id')->references('id')->on('places');

            $table->longText('description');
            $table->string('prevention_measures',20);
            $table->longText('measures_taken');

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
        Schema::dropIfExists('event_data');
    }
}
