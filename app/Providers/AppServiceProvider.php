<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Post;

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
        $categories = Category::all();
        $latest_six_posts = Post::limit(7)->get();

        view()->share(['categories'=>$categories,'latest_six_posts'=>$latest_six_posts]);
        Schema::defaultStringLength(191);
    }
}
