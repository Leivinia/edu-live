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


Route::match(['post', 'get'], 'admin/login', 'Admin\LoginController@login');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'CheckAdminLogin'], function () {
    Route::get('logout', 'LoginController@logout');
    Route::get('index/index', 'IndexController@index');
    Route::get('index/welcome', 'IndexController@welcome');
});
