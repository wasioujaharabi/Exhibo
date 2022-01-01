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

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/photographers','PagesController@photographers');
Route::resource('posts', 'PostsController');
Route::resource('profiles', 'ProfileController');
Route::resource('comments', 'CommentController');
Auth::routes();
Route::get('/posts/{file}','PostsController@download');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/review/{id}','PostsController@Review')->name('post.review');
Route::post('/review/{id}','ReviewController@store')->name('post.review.store');
Route::post('/review/update/{post_id}/{review_id}','ReviewController@update')->name('house.review.update');
Route::get('/review/delete/{id}','ReviewController@delete')->name('post.review.delete');
Route::get('posts/download/{id}','PostsController@download')->name('downloadfile');