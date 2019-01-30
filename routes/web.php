<?php

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

Route::get('/', "PostsController@index")->name('home');

Route::get('/posts/tags/{tag}', "PostsController@tags");

Auth::routes();

Route::resource('posts', 'PostsController');



Route::get('/home', 'PostsController@index');
