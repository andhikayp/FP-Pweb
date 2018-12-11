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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');

Route::middleware('auth', 'verified')->group(function(){
	Route::get('/post/create', 'PostController@create')->name('post.create');
	Route::post('/post/create', 'PostController@store')->name('post.store');
	Route::get('/post', 'PostController@index')->name('post.index');
	Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit'); 
	Route::patch('/post/{id}/edit', 'PostController@update')->name('post.update');
	Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.destroy');
	Route::post('/post/{post}/comment', 'PostCommentController@store')->name('post.comment.store');

	Route::get('/post/{post}', 'PostController@show')->name('post.show');

	Route::get('/profil','UserProfileController@edit')->name('user.edit');
	Route::post('/profil','UserProfileController@update');
	Route::delete('/profil','UserProfileController@destroy')->name('avatar.delete');
});
