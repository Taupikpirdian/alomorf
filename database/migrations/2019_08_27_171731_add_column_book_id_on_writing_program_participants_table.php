<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBookIdOnWritingProgramParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('writing_program_participants', function (Blueprint $table) {
            $table->integer('book_id')->after('user_id')->nullable();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('writing_program_participants', function (Blueprint $table) {
            $table->dropColumn('book_id');
        });
    }
}
