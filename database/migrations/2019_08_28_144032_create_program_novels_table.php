<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramNovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_novels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('participant_id');
            $table->string('title');
            $table->integer('category_id');
            $table->text('stage_1')->nullable();
            $table->text('stage_2')->nullable();
            $table->text('stage_3')->nullable();
            $table->text('stage_4')->nullable();
            $table->text('stage_5')->nullable();
            $table->text('stage_6')->nullable();
            $table->text('stage_7')->nullable();
            $table->text('stage_8')->nullable();
            $table->text('stage_9')->nullable();
            $table->text('stage_10')->nullable();
            $table->integer('book_id')->nullable();
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
        Schema::dropIfExists('program_novels');
    }
}
