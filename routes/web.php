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

Auth::routes();

//name以下はなくてもいい。artisanコマンドでroutesって打つときに見やすくなるだけ?

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu', 'MenuController@index')->name('menu');

Route::get('/same1', 'SameController@index')->name('same1');

Route::get('/same2', 'SameController@index2')->name('same2');

Route::get('/tweet', 'TweetController@index')->name('tweet');

Route::post('/tweet/create', 'TweetController@create')->name('create');

Route::get('/user', 'UserController@index')->name('user');

//フォローボタンを押されるとコントローラーに
Route::post('/users/follow', 'UserController@index2')->name('follow');



