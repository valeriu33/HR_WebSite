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

Route::get('/application', 'ApplicationController@index')->name('application');

Route::post('/application/post', 'ApplicationController@submit')->name('application.submit');

Route::get('/applicationView','ApplicationViewController@index')->name('applicationView');



Route::get('/admin/applylist','AdminApplyListController@index')->name('admin.applyList');

Route::post('/admin/applylist/post','AdminApplyListController@evaluating')->name('admin.startEvaluating');

Route::get('/admin/login','Auth\AdminLoginController@index')->name('admin.login');

Route::post('/admin/login/post','Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/admin','AdminHomeController@index')->name('admin.dashboard');
