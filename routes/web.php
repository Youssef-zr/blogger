<?php

use Illuminate\Support\Facades\Route;
use App\Category;
use App\Post;
use App\Contact;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//  dashboard routes
Auth::routes(['register'=>false]);

Route::group(['prefix'=>"admin",'middleware'=>'auth'],function(){
    Route::get('/logout', function () {
        Auth::logout();
        return redirect(url('/'));
    });
    Route::get('/','AdminController@index');
    Route::resource('categories', "CategoryController");
    Route::resource('posts', "PostController");
    Route::resource('contact', 'ContactController');
});

Route::get('/', 'AppController@index');
Route::get('/category/{tag}', 'AppController@category');
Route::get('/post/{tag}', 'AppController@singlePost');

Route::get('/contact', function () {
    $title = 'اتصل بنا';
    return view("website/contact",compact('title'));
});

Route::post('/contact','ContactController@store');
