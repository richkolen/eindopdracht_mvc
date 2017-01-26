<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Home*/
Route::get('/', [
	'uses' => '\Lara\Http\Controllers\HomeController@index',
	'as' => 'home',
]);


/*Authentication*/
Route::get('/signup', [
	'uses' => '\Lara\Http\Controllers\AuthController@getSignup',
	'as' => 'auth.signup',
	'middleware' => ['guest'],
]);

Route::post('/signup', [
	'uses' => '\Lara\Http\Controllers\AuthController@postSignup',
	'middleware' => ['guest'],
]);

Route::get('/signin', [
	'uses' => '\Lara\Http\Controllers\AuthController@getSignin',
	'as' => 'auth.signin',
	'middleware' => ['guest'],
]);

Route::post('/signin', [
	'uses' => '\Lara\Http\Controllers\AuthController@postSignin',
	'middleware' => ['guest'],
]);

Route::get('/signout', [
	'uses' => '\Lara\Http\Controllers\AuthController@getSignOut',
	'as' => 'auth.signout',
]);


/*Search*/
Route::get('/search', [
	'uses' => '\Lara\Http\Controllers\SearchController@getResults',
	'as' => 'search.results',
]);


/*UserProfile*/
Route::get('/user/{username}', [
	'uses' => '\Lara\Http\Controllers\ProfileController@getProfile',
	'as' => 'profile.index',
]);

Route::get('/profile/edit', [
	'uses' => '\Lara\Http\Controllers\ProfileController@getProfileEdit',
	'as' => 'profile.edit',
	'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
	'uses' => '\Lara\Http\Controllers\ProfileController@postProfileEdit',
	'middleware' => ['auth'],
]);


/*Friends*/
Route::get('/friends', [
	'uses' => '\Lara\Http\Controllers\FriendController@getIndex',
	'as' => 'friend.index',
	'middleware' => ['auth'],
]);

Route::get('/friends/add/{username}', [
	'uses' => '\Lara\Http\Controllers\FriendController@getTheRequest',
	'as' => 'friend.add',
	'middleware' => ['auth'],
]);

Route::get('/friends/accept/{username}', [
	'uses' => '\Lara\Http\Controllers\FriendController@getAcceptRequest',
	'as' => 'friend.accept',
	'middleware' => ['auth'],
]);


/*Post Status*/
Route::post('/status', [
	'uses' => '\Lara\Http\Controllers\StatusController@postStatus',
	'as' => 'status.post',
	'middleware' => ['auth'],
]);






