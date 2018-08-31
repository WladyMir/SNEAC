<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('notification_id');
            $table->foreign('notification_id')->references('id')->on('notifications');
            $table->longText('message');
            $table->date('event_date')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('status')->nullable();
            $table->string('service_boss')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('report_writer')->nullable();
            $table->string('place')->nullable();
            $table->longText('narration')->nullable();
            $table->string('name_research_leader')->nullable();
            $table->unsignedInteger('cause_id')->nullable();
            $table->foreign('cause_id')->references('id')->on('causes');
            $table->unsignedInteger('unsafe_action_id')->nullable();
            $table->foreign('unsafe_action_id')->references('id')->on('unsafe_actions');
            $table->unsignedInteger('origin_id')->nullable();
            $table->foreign('origin_id')->references('id')->on('origins');
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
        Schema::dropIfExists('reports');
    }
}
