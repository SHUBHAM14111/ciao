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

Route::get('/','PostsController@index');

Auth::routes();
Route::post('follow/{user}','FollowsController@store');
Route::get('/profile/{user}', 'ProfilesController@show');
Route::get('/profile/{user}/edit','ProfilesController@edit');
Route::patch('/profile/{user}','ProfilesController@update');
Route::resource('posts','PostsController');
