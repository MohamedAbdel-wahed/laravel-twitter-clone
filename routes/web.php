<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::group(['prefix'=>'tweets', 'middleware'=>'auth'], function(){
    Route::get('/', 'TweetController@index')->name('home');
    Route::post('/', 'TweetController@store')->name('tweets.store');
    Route::post('/{tweet}/like', 'TweetController@like')->name('tweets.like');
});

Route::group(['prefix'=>'profile', 'middleware'=>'auth'], function(){
    Route::get('/{user}', 'ProfileController@show')->name('profile');
    Route::post('/{user}/follow', 'ProfileController@follow')->name('profile.follow');
    Route::get('/{user}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/{user}', 'ProfileController@update')->name('profile.update');
});

Route::get('/explore', 'ProfileController@explore')->middleware('auth')->name('explore');
