<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banner_file_id')->references('id')->on('files')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('article_category_id')->references('id')->on('article_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('title', 64);
            $table->longText('content');
            $table->string('slug');
            $table->string('source', 16);
            $table->boolean('show_flag')->default(true);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

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
        Schema::dropIfExists('articles');
    }
}
