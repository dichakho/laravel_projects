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
Route::get('admin', 'HomeController@getView');
// Route::get('admin', function(){
//     return view('admin.users.list');
// });
Route::group(['prefix' => 'admin'], function(){
	Route::group(['prefix' => 'category'], function(){
		Route::get('list', function(){
			return view('admin.category.list');
		});
		Route::get('add', function(){
			return view('admin.category.add');
        });
        Route::get('edit', function(){
			return view('admin.category.edit');
		});
    });
    Route::group(['prefix' => 'users'], function(){
		Route::get('list', function(){
			return view('admin.users.list');
		});
		Route::get('add', function(){
			return view('admin.users.add');
        });
        Route::get('edit', function(){
			return view('admin.users.edit');
		});
    });
    Route::group(['prefix' => 'article'], function(){
		Route::get('list', function(){
			return view('admin.article.list');
		});
		Route::get('add', function(){
			return view('admin.article.add');
        });
        Route::get('edit', function(){
			return view('admin.article.edit');
		});
	});

});