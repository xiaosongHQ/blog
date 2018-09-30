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

Route::get('/','HomeController@index');
Route::get('/home/me','HomeController@me');
Route::get('/home/article_list','HomeController@article_list');
Route::get('/home/{id}.html','HomeController@show');
Route::resource('/home/riji','RijiController');


Route::get('/admin/login', 'AdminController@login');
Route::post('/admin/login', 'AdminController@dologin');

Route::group(['middleware'=>'admin'],function(){
	Route::get('/admin/index','AdminController@index');
	Route::get('/admin/set','AdminController@create_set');
	Route::post('/admin/set','AdminController@set');
	Route::resource('/user','UserController');
	Route::resource('/article','ArticleController');
	Route::resource('/link','LinkController');
	Route::resource('/cate','CateController');
	Route::resource('/tag','TagController');
	Route::get('/admin/loginout', 'AdminController@loginout');
});
