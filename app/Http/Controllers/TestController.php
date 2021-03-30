<?php

namespace App\Http\Controllers;

use App\Post;

class TestController extends Controller
{
    public function index()
    {
        // $posts = new Post();



        // $posts = $posts->whereHas('categories')->first();

        // foreach ($posts->categories as $post) {
        //     echo $post;
        // }

        return view('/website/index');
    }
}
