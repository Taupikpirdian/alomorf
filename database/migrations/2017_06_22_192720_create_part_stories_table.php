<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_stories', function (Blueprint $table) {
            $table->increments('id_part_story');
            $table->integer('id_story')->unsigned()->nullable();
            $table->integer('id_part_story_status')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->text('story')->nullable();
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
        Schema::dropIfExists('part_stories');
    }
}
