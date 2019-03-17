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

Route::get('/','Home\IndexController@index');

###后台
#登录
Route::match(['get', 'post'], 'admin/login', 'Admin\LoginController@login');

//TODO.访问的时候加前缀admin
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=> ['CheckLogin']], function() {
    #退出
    Route::get('logout', 'LoginController@logout');
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
    ###直播课程
    #直播流列表
    Route::get('stream/index', 'StreamController@index');
    Route::match(['get', 'post'], 'stream/add', 'StreamController@add');
    #直播课程列表
    Route::get('live/index', 'LiveController@index');
    Route::match(['get', 'post'], 'live/add', 'LiveController@add');
    ###RBAC
    #管理员模块
    Route::get('admin/index', 'AdminController@index');
    #权限模块
    Route::get('auth/index', 'AuthController@index');
    Route::match(['get', 'post'], 'auth/add', 'AuthController@add');
    #角色模块
    Route::get('role/index', 'RoleController@index');
    //Route::get('role/assignAuth', 'RoleController@assignAuth');
    Route::match(['get', 'post'], 'role/assignAuth/{roleId}', 'RoleController@assignAuth');
    Route::post('upload','UploadController@put');

    Route::get('paper/index','PaperController@index');
    Route::match(['get','post'],'paper/add','PaperController@add');
    Route::get('question/index','QuestionController@index');

});

//TODO. 非项目代码 仅测试上传
Route::any('day4/t6', 'Admin\Day4Controller@t6');

Route::get('paper/{paperid}','Home\PaperController@index');


