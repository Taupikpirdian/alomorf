<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id_story');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('id_language')->unsigned()->nullable();
            $table->integer('id_category')->unsigned()->nullable();
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('viewer')->unsigned()->nullable();
            $table->integer('rating')->unsigned()->nullable();
            $table->string('cover_photo')->nullable();
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
        Schema::dropIfExists('stories');
    }
}
