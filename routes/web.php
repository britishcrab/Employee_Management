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
    Route::get('home', 'AdminController@get_home')->name('admin.get.home');
    Route::get('list', 'AdminController@get_list')->name('admin.get.list');
    Route::post('delete', 'AdminController@post_delete')->name('admin.delete.post');
    Route::get('delete/{id}', 'AdminController@get_delete')->name('admin.get.delete');
    Route::get('delete.completion', 'AdminController@get_delete_completion')->name('admin.delete.completion');
    Route::post('update', 'AdminController@post_update')->name('admin.update.post');
    Route::get('update/{id?}', 'AdminController@get_update')->name('admin.get.update');
    Route::get('update.confirm/{id}', 'AdminController@get_update_confirm')->name('admin.update.confirm.get');
    Route::get('update.completion', 'AdminController@get_update_completion')->name('admin.update.completion.get');
    Route::get('register', 'AdminController@get_register')->name('admin.register.get');
    Route::post('register', 'AdminController@post_register')->name('admin.register.post');
    Route::get('register/confirm', 'AdminController@get_register_confirm')->name('admin.register.confirm.get');
    Route::get('register.completion', 'AdminController@get_register_completion')->name('admin.register.completion');
});

Route::prefix('admin/report')->group(function () {
    Route::get('/', 'AdminReportController@getList')->name('admin_report.list.get');
    Route::get('content/{report_id}', 'AdminReportController@getContent')->name('admin_report.content.get');
    Route::post('comment', 'AdminReportController@postComment')->name('admin_report.comment.post');
    Route::get('comment.confirm', 'AdminReportController@getConfirm')->name('admin_report.comment.confirm.get');
    Route::get('comment.modification', 'AdminReportController@getModification')->name('admin_report.comment.modification.get');
    Route::post('comment.confirm', 'AdminReportController@postConfirm')->name('admin_report.comment.confirm.post');
    Route::get('comment.completion', 'AdminReportController@getCompletion')->name('admin_report.comment.completion.get');
});

Route::prefix('report')->group(function () {
    Route::get('home', 'ReportController@getHome')->name('report.home.get');
    Route::get('create/{status?}', 'ReportController@getCreate')->name('report.create.get');
    Route::post('create', 'ReportController@postCreate')->name('report.create.post');
    Route::get('create.confirm', 'ReportController@getCreateConfirm')->name('report.create.confirm.get');
    Route::post('create.confirm', 'ReportController@postCreateConfirm')->name('report.create.confirm.post');
    Route::get('create.modification', 'ReportController@getModification')->name('report.modification.get');
    Route::get('create.completion', 'ReportController@getCreateCompletion')->name('report.create.completion.get');
    Route::get('list', 'ReportController@getList')->name('report.list.get');
    Route::get('content/{report_id}', 'ReportController@getCcontent')->name('report.content.get');
    Route::get('content.delete/{report_id}', 'ReportController@getDelete')->name('report.delete.get');
    Route::post('delete', 'ReportController@postDelete')->name('report.delete.post');
    Route::get('delete.confirm', 'ReportController@getDeleteCompletion')->name('report.delete.completion.get');
});

Route::prefix('auth')->group(function () {
    Route::get('signin', 'AuthenticationController@getSignin')->name('signin');
    Route::post('signin', 'AuthenticationController@postSignin')->name('signin.post');
    Route::get('signout', 'AuthenticationController@getSignout')->name('signout');
    Route::get('signout.send', 'AuthenticationController@postSignout')->name('signout.post');
});

Route::get('mail/preview', function () {
    return new App\Mail\MailTest;
});
Route::get('mail/testsend', 'MailController@testmail');