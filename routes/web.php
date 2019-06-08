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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('admin', 'HomeController@getView');
Route::get('admin/dashboard', 'HomeController@getViewDashboard');
// Route::get('admin', function(){
//     return view('admin.users.list');
// });
Route::get('admin/login', 'userController@getLogin');
Route::post('admin/login', 'userController@postLogin');
Route::get('admin/register', 'userController@getRegister');
Route::post('admin/register', 'userController@postRegister');
Route::get('admin/logout', 'userController@getLogout');

Route::group(['prefix' => 'admin', 'middleware'=>'checkLogin'], function(){
	Route::group(['prefix' => 'category'], function(){
		Route::get('list', 'categoryController@getList');
		Route::get('add', 'categoryController@getAdd');
		Route::post('add', 'categoryController@postAdd');
		Route::get('edit/{id}', 'categoryController@getEdit');
		Route::post('edit/{id}', 'categoryController@postEdit');
		Route::get('delete/{id}', 'categoryController@getDel');	
		Route::get('restore/{id}', 'categoryController@getRestore');
    });
    Route::group(['prefix' => 'user'], function(){
		Route::get('list', 'userController@getList');
		Route::get('add', 'userController@getAdd');
		Route::post('add', 'userController@postAdd');
		Route::get('edit/{id}', 'userController@getEdit');
		Route::post('edit/{id}', 'userController@postEdit');
		Route::get('delete/{id}', 'userController@getDel');
    });
    Route::group(['prefix' => 'article'], function(){
		Route::get('list', 'articleController@getList');
		Route::get('add', 'articleController@getAdd');
		Route::post('add', 'articleController@postAdd');
		Route::get('edit/{id}', 'articleController@getEdit');
		Route::post('edit/{id}', 'articleController@postEdit');
		Route::get('delete/{id}', 'articleController@getDel');
	});
	Route::group(['prefix' => 'tag'], function(){
		Route::get('list', 'tagController@getList');
		Route::get('add', 'tagController@getAdd');
		Route::post('add', 'tagController@postAdd');
		Route::get('edit/{id}', 'tagController@getEdit');
		Route::post('edit/{id}', 'tagController@postEdit');
		Route::get('delete/{id}', 'tagController@getDel');
		Route::get('restore/{id}', 'tagController@getRestore');
	});
	Route::group(['prefix' => 'ajax'], function(){
		Route::get('category/{id}', 'ajaxController@getAjax');
		Route::get('cate/{id}', 'ajaxController@getAjax');
	});
	
	Route::get('', 'HomeController@getView');
	Route::get('dashboard', 'HomeController@getViewDashboard');
});

Route::get('', 'pageController@getViewHomePage');
Route::get('post/{url}', 'pageController@getNews');
Route::get('postbycate/{url}', 'pageController@getNewsbyCate');