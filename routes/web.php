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
    Route::post('delete', 'AdminController@post_delete')->name('admin.delete.post');
    Route::get('delete/{id}', 'AdminController@get_delete')->name('admin.get.delete');
    Route::post('update', 'AdminController@post_update')->name('admin.post.update');
    Route::get('update/{id?}', 'AdminController@get_update')->name('admin.get.update');
    Route::get('update.confirm', 'AdminController@get_update_confirm')->name('admin.get.update.confirm');
});

Route::prefix('admin/report')->group(function () {
    Route::get('home/get', 'AdminReportController@get_list')->name('admin_report.list.get');
    Route::post('content/post', 'AdminReportController@post_content')->name('admin_report.content.post');
    Route::get('content/post', 'AdminReportController@post_content')->name('admin_report.content.get');
    Route::post('content/comment/post', 'AdminReportController@post_comment')->name('admin_report.comment.post');
});

Route::prefix('report/')->group(function () {
    Route::get('home/get', 'ReportController@get_home')->name('report.home.get');
    Route::get('create/get', 'ReportController@get_create')->name('report.create.get');
    Route::post('create/post', 'ReportController@post_create')->name('report.create.post');
    Route::get('create/confirm/get', 'ReportController@get_create_confirm')->name('report.create.confirm.get');
    Route::post('create/send/post', 'ReportController@post_create_send')->name('report.create.send.post');
    Route::get('create/done/get', 'ReportController@get_create_done')->name('report.create.done.get');
    Route::get('list/get', 'ReportController@get_list')->name('report.list.get');
    Route::post('content/post', 'ReportController@post_content')->name('report.content.post');
    Route::post('delete/post', 'ReportController@post_delete')->name('report.delete.post');
    Route::get('delete/done/get', 'ReportController@get_delete_done')->name('report.delete.done.get');
});