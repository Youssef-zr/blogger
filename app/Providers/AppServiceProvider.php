<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Post;
use App\Contact;

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
        update_messages();

        // categories
        $categories = Category::whereHas('posts')->get();

        // last six posts
        $latest_six_posts = Post::limit(5)->where('published',"=",1)->orderBy('id',"desc")->get();

        view()->share(['categories'=>$categories,'latest_six_posts'=>$latest_six_posts]);
        Schema::defaultStringLength(191);
    }
}
