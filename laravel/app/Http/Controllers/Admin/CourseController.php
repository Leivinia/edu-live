<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Course;
use App\Http\Models\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 【点播】课程模块
 * @author phpopenfather <[email address]>
 */
class CourseController extends Controller
{
    #首页
    public function index()
    {
        #1.获取所有课程数据
        $courses = Course::with('profession')->orderBy('id', 'desc')->paginate(2);
        #2.加载视图
        return view('admin.course.index', compact('courses'));
    }

    #添加
    public function add(Request $request)
    {
        #1.判断提交方式
        if ($request->isMethod('post')) {
            #2.接受数据
            $postData = $request->only('course_name', 'course_price', 'teacher', 'profession_id'); //$_POST
            #2.接受数据（图片） $_FILES
            if ($request->hasFile('img') && $request->file('img')->isValid())
            {
                $filename = $request->file('img')->store('img', 'uploads');
                $postData['img'] = $filename;
            }
            #3.过滤
            #4.入库
            $rs = Course::create($postData);
            #5.理论上跳转，但是异步请求得返回信息
            echo $rs ? 'success' : 'error';
        } else {
            #2.获取所有专业分类数据
            $professions = Profession::get();
            #3.加载视图 并 传递数据
            return view('admin.course.add', compact('professions'));
        }
    }
}
