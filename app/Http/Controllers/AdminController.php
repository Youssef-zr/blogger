<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Post;

class AdminController extends Controller
{
   public function index()
   {
       $title='اخر الاحصائيات';
       $count_msg = count(Contact::all());
       $count_articles = count(Post::all());

       return view('/dashboard/index',compact('title','count_msg','count_articles'));
   }
}
