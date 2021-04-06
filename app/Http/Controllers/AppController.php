<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class AppController extends Controller
{
    public function index()
    {
        $title = "الرئيسية";
        $latest_cat_posts = Post::whereHas('categories')->limit(10);

        return view('/website/index', compact('title', 'latest_cat_posts'));
    }

    public function category()
    {
        return view('/website/categories');
    }

    public function singlePost()
    {
        return view("/website/single");
    }
}
