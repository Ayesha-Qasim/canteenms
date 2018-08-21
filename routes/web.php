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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts/{id}', 'PostController@show');

Route::get('/admin/san-pham', 'ProductManage@index');

Route::post('/admin/san-pham/add',[
	'as'   => 'addProduct',
	'uses' => 'ProductManage@create'
]);

// Route::post('/change-password/change', [
		// 		'as'   => 'changePasswordRes',
		// 		'uses' => 'ChangePwdController@UpdateInfo'
		// 	]);

Route::get('/admin/danh-sach-san-pham', 'ProductManage@show');
Route::get('/admin/edit/{id}', 'ProductManage@getEdit');
Route::post('/admin/edit', 'ProductManage@doEdit')->name('product.edit');
Route::get('/admin/delete/{id}', 'ProductManage@doDelete');