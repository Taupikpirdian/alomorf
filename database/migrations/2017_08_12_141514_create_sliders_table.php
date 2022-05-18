<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->text('deskripsi');
            $table->integer('id_users')->unsigned()->nullable();
            $table->foreign('id_users')->references('id')->on('users');
            $table->string('foto');
            $table->integer('order')->unsigned()->nullable();
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
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropForeign('sliders_id_users_foreign');
        });
        Schema::dropIfExists('sliders');
    }
}
