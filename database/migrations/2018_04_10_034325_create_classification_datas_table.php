<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassificationDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classification_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('classification_id');
            $table->foreign('classification_id')->references('id')->on('classifications');
            $table->unsignedInteger('events_name_id');
            $table->foreign('events_name_id')->references('id')->on('events_names');
            $table->unsignedInteger('detail_id')->nullable();
            $table->string('other_detail')->nullable();
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
        Schema::dropIfExists('classification_datas');
    }
}
