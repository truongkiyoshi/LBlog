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
Route::get('/', 'PostController@getAllIndex');
Route::get('/tct/{slug}', 'PostController@bv');

Route::get('admin', 'AdminController@index')->middleware('admin');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('mess/send', 'AdminController@addFeedback');

/**************Setting*****************/
/*
| @Controller: AdminController
| @middleware('admin'): Kiểm tra quyền admin
*/
Route::get('admin/setting', ['as' => 'getSetting','uses'=>'AdminController@getSetting'])->middleware('admin');
Route::post('admin/setting', ['as' => 'postSetting','uses'=>'AdminController@postSetting'])->middleware('admin');

/**************Quản lý user*****************/
/*
| @Controller: UserController
| @middleware('admin'): Kiểm tra quyền admin
*/
Route::get('admin/manage-user', 'UserController@getList')->middleware('admin');

Route::get('admin/manage-user/add', 'UserController@getAdd')->middleware('admin');
Route::post('admin/manage-user/add', 'UserController@postAdd')->middleware('admin');

Route::get('admin/manage-user/edit/{id}','UserController@getEdit')->middleware('admin');
Route::post('admin/manage-user/edit/{id}', 'UserController@postEdit')->middleware('admin');

Route::get('admin/manage-user/delete/{id}', 'UserController@delete')->middleware('admin');

/******************Quản lý Post************************/
/*
| @Controller: PostController
| @middleware('admin'): Kiểm tra quyền admin
*/
Route::get('admin/manage-post', 'PostController@index')->middleware('admin');

Route::get('admin/manage-post/add', ['as' => 'getAddPost', 'uses' => 'PostController@getAdd'])->middleware('admin');
Route::post('admin/manage-post/add', 'PostController@postAdd')->middleware('admin');

Route::get('admin/manage-post/edit/{id}', ['as' => 'getEditPost','uses' => 'PostController@getEdit'])->middleware('admin');
Route::post('admin/manage-post/edit/{id}',['as' => 'postEditPost','uses' => 'PostController@postEdit'])->middleware('admin');
Route::get('admin/manage-post/delete/{id}', 'PostController@delete')->middleware('admin');
