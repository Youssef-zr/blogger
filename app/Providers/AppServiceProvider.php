<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // messages
        if (\Schema::hasTable('Contact')) {
            update_messages();
        }

        // categories
        if (\Schema::hasTable('Categories')) {
            $categories = Category::whereHas('posts')->get();
            view()->share(['categories' => $categories]);
        }
        
        // last six posts
        if (\Schema::hasTable('Posts')) {
            $latest_six_posts = Post::limit(5)->where('published', "=", 1)->orderBy('id', "desc")->get();
            view()->share(['latest_six_posts' => $latest_six_posts]);
        }

        Schema::defaultStringLength(191);
    }
}
