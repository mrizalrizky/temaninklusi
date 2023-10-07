<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->foreignId('user_id')->references('user_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('event_detail_id')->references('event_detail_id')->on('event_details')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('status_id')->references('status_id')->on('master_statuses')->onUpdate('CASCADE')->onDelete('CASCADE');

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
        Schema::dropIfExists('events');
    }
}
