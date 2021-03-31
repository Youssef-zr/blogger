<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    public function index()
    {
        return view('/website/index');
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
