<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('pengarang');
            $table->string('genre');
            $table->string('foto');
            $table->timestamps();
        }); //Create field book
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books'); //
    }
}
