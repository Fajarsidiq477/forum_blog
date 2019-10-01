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


Auth::routes();
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/user/{username}', 'ViewerController@user')->name('user.username') ;
Route::get('/profile', 'ViewerController@userProfile')->name('user.profile') ;
Route::get('/users', 'UserController@index')->name('users') ;
Route::post('/users/toggleFollow', 'UserController@toggleFollow')->name('users.toggleFollow') ;

Route::get('/', 'ViewerController@index')->name('viewer.index');
Route::get('/b/{url}', 'ViewerController@postPage')->name('viewer.postPage') ;
Route::get('/tag', 'ViewerController@ShowTag')->name('tags.all') ;
Route::get('/tag/{nama_tag}', 'ViewerController@ShowTagDetail')->name('tags.detail') ;

Route::post('/comment/store', 'CommentController@store')->name('comment.add') ;
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add') ;

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts', 'PostController') ;
