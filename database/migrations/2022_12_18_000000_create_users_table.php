<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('name', 64);
            $table->string('username', 32)->unique();
            $table->string('email', 64)->unique();
            $table->string('phone_number', 16);
            $table->string('password', 255);
            $table->string('reset_token')->nullable();
            $table->dateTime('expired_token')->nullable();
            $table->boolean('ban_flag')->default(false);
            $table->boolean('active_flag')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
