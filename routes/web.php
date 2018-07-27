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
    return view('employee.top');
});

Route::get('/employeetest', 'SampleController@employeetest');

Route::get('/roletest', 'SampleController@roletest');

Route::get('/employeeroletest', 'SampleController@employeeroletest');

Route::get('/languagetest', 'SampleController@languagetest');

Route::resource('/Employee', 'EmployeeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
