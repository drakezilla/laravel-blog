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

Route::get('/', 'PostController@getIndex')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'HomeController@getPostForm')->name('post.form');
Route::get('/post/detail/{id}', 'HomeController@getPost')->name('post.detail');
Route::post('/post', 'HomeController@createPost')->name('post.form');

Route::get('/post/edit/{id}', 'HomeController@editPost')->name('post.edit');
Route::post('/post/edit/{id}', 'HomeController@updatePost')->name('post.update');

Route::get('/post/delete/{id}', 'HomeController@deletePost')->name('post.delete');

Route::get('/post/read/{post_id}', 'PostController@getFullPost')->name('post.read');
