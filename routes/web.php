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
    return view('auth/login');
})->middleware('guest');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/sell', 'sellController@sell');
Route::get('/sell/{id}', 'sellController@show');

Route::post('/buy', 'buyController@buy');
Route::get('/buy/{id}', 'buyController@show');
Route::post('/test', 'HomeController@test2');
Route::post('/deal', 'CommentController@deal');
Route::post('/addcomment', 'CommentController@commentpost');
Route::get('/notify/{id}', 'CommentController@senddatauser');
Route::get('/user/{id}', 'CommentController@viewcomment');
Route::get('/map', 'googlemapAPIController@index');
Route::post('/buy/delete', 'buyController@delete');
Route::post('/sell/delete', 'sellController@delete');


