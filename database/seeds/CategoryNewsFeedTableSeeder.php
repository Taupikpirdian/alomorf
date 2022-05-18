<?php

use Illuminate\Database\Seeder;
use App\CategoryNewsFeed;

class CategoryNewsFeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_news_feed = new CategoryNewsFeed();
        $category_news_feed->id_category_news_feed = 1;
        $category_news_feed->name = 'Kreator';
        $category_news_feed->save();

        $category_news_feed = new CategoryNewsFeed();
        $category_news_feed->id_category_news_feed = 2;
        $category_news_feed->name = 'Karya';
        $category_news_feed->save();

        $category_news_feed = new CategoryNewsFeed();
        $category_news_feed->id_category_news_feed = 3;
        $category_news_feed->name = 'Komunitas';
        $category_news_feed->save();

        $category_news_feed = new CategoryNewsFeed();
        $category_news_feed->id_category_news_feed = 4;
        $category_news_feed->name = 'Tips dan Trick';
        $category_news_feed->save();

        $category_news_feed = new CategoryNewsFeed();
        $category_news_feed->id_category_news_feed = 5;
        $category_news_feed->name = 'News';
        $category_news_feed->save();
    }
}
