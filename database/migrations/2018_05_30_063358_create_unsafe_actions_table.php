<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnsafeActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unsafe_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_error');
            $table->longText('planningAction');
            $table->longText('executionAction');
            $table->longText('executionOmission');
            $table->longText('planningOmission');
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
        Schema::dropIfExists('unsafe_actions');
    }
}
