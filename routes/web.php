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

Route::get('/employeetest', 'SampleController@employeetest');

Route::get('/roletest', 'SampleController@roletest');

Route::get('/employeeroletest', 'SampleController@employeeroletest');

Route::get('/languagetest', 'SampleController@languagetest');
>>>>>>> migration
