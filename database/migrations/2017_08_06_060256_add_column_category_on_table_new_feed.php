<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCategoryOnTableNewFeed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_feeds', function (Blueprint $table) {
            $table->integer('id_category_news_feed')->unsigned()->nullable()->after('id_status_new_feed');
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
            $table->dropColumn('id_category_news_feed');
        });
    }
}
