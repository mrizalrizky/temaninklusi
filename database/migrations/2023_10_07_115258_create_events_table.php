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
            $table->foreignId('event_category_id')->references('id')->on('event_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('event_banner_file_id')->references('id')->on('files')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('event_license_file_id')->nullable()->references('id')->on('files')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('event_proposal_file_id')->references('id')->on('files')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->boolean('event_license_flag');
            $table->boolean('disability_event_flag');
            $table->boolean('show_flag')->default(true);
            $table->string('created_by', 32)->nullable();
            $table->string('updated_by', 32)->nullable();

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
