<?php

namespace App\Providers;

use App\Story;
use App\NewFeed;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('stories') && Schema::hasTable('new_feeds')) {
            $story_rights = Story::orderBy('stories.created_at', 'desc')->limit(3)
                          // ->leftJoin('users', 'users.id', '=', 'stories.id_user')
                          ->leftJoin('categories', 'categories.id_category', '=', 'stories.id_category')
                          ->select( 
                                    // 'users.name as nama_user',
                                    // 'users.id',
                                    'stories.title',
                                    'stories.description',
                                    'stories.id_story',
                                    'stories.cover_photo',
                                    'stories.viewer',
                                    'categories.name as nama_category',
                                    'categories.id_category'
                                  )
                          ->get();
    
            $news_rights = NewFeed::where('id_status_new_feed', 1)
                          ->orderBy('created_at', 'desc')->limit(3) 
                          ->get();
            
            View::share ( 'story_rights', $story_rights );
            View::share ( 'news_rights', $news_rights );
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
