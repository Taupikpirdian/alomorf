<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newfeeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('id_status_new_feed')->nullable();
            $table->string('published_at')->nullable();
            $table->string('photo');
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
        Schema::dropIfExists('newfeeds');
    }
}
