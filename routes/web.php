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


Route::get('/', function () {
    return view('top');
});

Route::get('/admin', 'EmployeeController@admin');
Route::get('/list', 'EmployeeController@employee_list');
Route::get('/employee_delete', 'EmployeeController@employee_delete');
Route::get('/employee_update', 'EmployeeController@employee_update');

Route::post('/employee_edit', function(){
    if(isset($_POST['update'])){
        return view('employee.employee_update');
    }
    else{
        return view('employee.employee_delete');
    }
});



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
// Route::resource('/Employee', 'EmployeeController');
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
