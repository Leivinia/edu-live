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


###后台
#登录
Route::match(['get', 'post'], 'admin/login', 'Admin\LoginController@login');

//TODO.访问的时候加前缀admin
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'CheckLogin'], function() {
    #退出
    Route::get('admin/logout', 'Admin\LoginController@logout');
    #后台首页
	Route::get('index/index', 'IndexController@index');
	Route::get('index/welcome', 'IndexController@welcome');
	###点播
    #专业管理
    Route::get('profession/index', 'ProfessionController@index');
    #课程管理
    Route::get('course/index', 'CourseController@index');
    Route::match(['get', 'post'], 'course/add', 'CourseController@add');
    #课时管理
    Route::get('lesson/index', 'LessonController@index');
    Route::match(['get', 'post'], 'lesson/add', 'LessonController@add');
    Route::get('lesson/play/{lessonId}', 'LessonController@play');
});

//TODO. 非项目代码 仅测试上传
Route::any('day4/t6', 'Admin\Day4Controller@t6');

Route::get('/', function () {

    // config(文件名.键.键n)
    echo config('filesystems.disks.uploads.root');
    die;
    return view('welcome');
});

