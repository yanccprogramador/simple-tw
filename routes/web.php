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

Route::get('/', 'HomeController@index');
Route::get('/user/icon', 'UserController@viewUpload');
Route::post('/user/icon', 'UserController@upload');
Route::post('/tw/create', 'HomeController@add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
