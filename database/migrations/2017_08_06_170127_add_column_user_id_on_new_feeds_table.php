<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUserIdOnNewFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_feeds', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable()->after('id_category_news_feed');
        });

    }
 
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_feeds', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
