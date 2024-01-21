<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_details', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->longText('description');
            $table->string('location', 64);
            $table->string('slug', 255);
            $table->string('contact_email', 64);
            $table->string('contact_phone', 16);
            $table->string('social_media_link', 64);
            $table->json('event_facilities')->nullable();
            $table->jsonb('event_benefits')->nullable();
            $table->integer('quota');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->date('max_register_date');

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
        Schema::dropIfExists('event_details');
    }
}
