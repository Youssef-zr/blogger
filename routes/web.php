<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/','AdminController@index');
    Route::resource('categories', "CategoryController");
    Route::resource('posts', "PostController");
});

Route::get('/', 'AppController@index');
Route::get('/category/{tag}', 'AppController@category');
Route::get('/post/{tag}', 'AppController@singlePost');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
