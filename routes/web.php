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
});

Route::prefix('admin')->group(function () {
    Route::get('get/admin', 'AdminController@get_admin')->name('admin.get.home');
    Route::get('get/list', 'AdminController@get_list')->name('admin.get.list');
    Route::get('get/delete', 'AdminController@get_delete')->name('admin.get.delete');
    Route::post('get/update', 'AdminController@get_update')->name('admin.get.update');
    Route::get('post/update', 'AdminController@post_update')->name('admin.post.update');
    Route::get('get/update/confirm', 'AdminController@get_update_confirm')->name('admin.get.update.confirm');
});
//
//Route::get('/', function () {
//    return view('top');
//});
//
//Route::get('/admin', 'AdminController@admin');
//Route::get('/list', 'AdminController@employee_list');
//Route::get('/employee_delete', function(){
//    return view('employee.employee_delete');
//});
//Route::post('/employee_update', 'AdminController@employee_update');
//
//Route::post('/employee_edit', function(){
//    if(isset($_POST['update'])){
//        return view('employee.employee_update');
//    }
//    else{
//        return view('employee.employee_delete');
//    }
//});
//


// Route::get('/', 'AppController@index');
// Route::get('/employeeadmin', 'AppController@employee_admin');
//
// Route::get('/employeetest', 'SampleController@employeetest');
//
// Route::get('/roletest', 'SampleController@roletest');
//
// Route::get('/employeeroletest', 'SampleController@employeeroletest');
//
// Route::get('/languagetest', 'SampleController@languagetest');
//
// Route::resource('/Employee', 'AdminController');
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
