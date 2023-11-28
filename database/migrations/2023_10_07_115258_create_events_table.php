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
            $table->id();
            $table->foreignId('organizer_id')->references('id')->on('master_organizers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('event_detail_id')->references('id')->on('event_details')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('status_id')->references('id')->on('master_statuses')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->tinyInteger('show_flag')->default(1);

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
