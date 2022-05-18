<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumTanggalTerbitToPartStoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('part_stories', function (Blueprint $table) {
            $table->date('tanggal_terbit')->nullable()->after('story');
        });

    }
 
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('part_stories', function (Blueprint $table) {
            $table->dropColumn('tanggal_terbit');
        });
    }
}
