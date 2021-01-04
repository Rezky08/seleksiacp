<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth.authed'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', 'LoginController@index')->name('login');
        Route::post('/', 'LoginController@login');
    });

    Route::group(['prefix' => 'register'], function () {
        Route::get('/', 'RegisterController@index');
        Route::post('/', 'RegisterController@regist');
    });
});
Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout', 'LoginController@logout');
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'DashboardController@index');
    });
    Route::resource('student', 'StudentController');
    Route::get('/student/export/excel', 'StudentController@export');
});

Route::get('/', 'HomeController@landingPage');
Route::get('/about', 'AboutController@index');
Route::get('/contact', 'ContactController@index');
