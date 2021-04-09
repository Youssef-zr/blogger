<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class MessageController extends Controller
{
   public function index()
   {
       $title = 'قائمة الرسائل';
       $messages = Contact::all();
       return view('dashboard/messages/index',compact('title','messages'));
   }
}
