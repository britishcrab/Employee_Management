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

Route::get('laravel', function () {
    return view('welcome');
});

Route::get('/', function(){
	return view('top');
})->name('top');

Route::prefix('admin')->group(function () {
    Route::get('get/home', 'AdminController@get_home')->name('admin.get.home');
    Route::get('get/list', 'AdminController@get_list')->name('admin.get.list');
//    Route::get('get/delete', 'AdminController@get_delete')->name('admin.get.delete');
    Route::get('post/delete', 'AdminController@post_delete')->name('admin.post.delete');
    Route::post('get/update', 'AdminController@get_update')->name('admin.get.update');
    Route::get('post/update', 'AdminController@post_update')->name('admin.post.update');
    Route::get('get/update/confirm', 'AdminController@get_update_confirm')->name('admin.get.update.confirm');
});

Route::prefix('report')->group(function () {
    Route::get('get/home', 'ReportController@get_home')->name('report.get.home');
    Route::get('get/create', 'ReportController@get_create')->name('report.get.create');
    Route::post('post/create', 'ReportController@post_create')->name('report.post.create');
    Route::get('get/create/confirm', 'ReportController@get_create_confirm')->name('report.get.create.confirm');

});