<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Post;
use App\Contact;

class AppController extends Controller
{
    public function index()
    {
        $title = "الرئيسية";
        $latest_cat_posts = Category::whereHas('posts')->limit(15)->get();

        return view('/website/index', compact('title', 'latest_cat_posts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        $cat_title = $category->title;

        $category_posts = $category->posts()->where('published', "=", 1)->paginate(9);

        return view('/website/categories', ['title' => $cat_title,'catTitle'=>$cat_title, 'category_posts' => $category_posts]);
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        $post_cats = $post->categories()->get();

        $related_posts = [];
        $seo_description = $post->meta_title;
        $title = Str::limit($post->title, 20,'');

        foreach ($post_cats as $category) {
            array_push($related_posts, $category->posts()->where('published', "=", 1)->distinct()->limit(8)->get());
        }

        return view("/website/single", compact('post', 'related_posts','seo_description','title'));
    }

}
