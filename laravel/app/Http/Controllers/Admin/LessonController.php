<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Lesson;
use App\Http\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
/**
 * 【点播】课时模块
 * @author phpopenfather <[email address]>
 */
class LessonController extends Controller
{
    #播放视频
    public function play($lessonId)
    {
        #1.根据$lessonId获取视频播放地址
        $lesson = Lesson::where('id', (int)$lessonId)->first();
        #2.通过video标签播放视频
        $videoAddress = asset('uploads') . '/' . $lesson->video_address;
        echo <<<STR
    <video src="{$videoAddress}" autoplay controls="controls">
您的浏览器不支持 video 标签。
</video>
STR;

    }

    #首页
    public function index()
    {

        $lessons = Cache::get('lessons');
        if (!$lessons){
            #1.获取所有课时数据
            $lessons = Lesson::with('course')->orderBy('id', 'desc')->paginate(2);
            sleep(5);
            Cache::put('lessons', $lessons, 10);
        }
        #2.加载视图 并 传递数据
        return view('admin.lesson.index', compact('lessons'));
    }

    #添加
    public function add(Request $request)
    {
        #1.判断提交方式
        if ($request->isMethod('post')) {
            #2.接受数据
            $postData = $request->only('course_id', 'lesson_name', 'video_time', 'state');//$_POST
            #2.接受数据（视频） $_FILES
            if ($request->hasFile('video') && $request->file('video')->isValid())
            {
                $filename = $request->file('video')->store('video', 'uploads');
                $postData['video_address'] = $filename;
            }
            #3.过滤
            #4.入库
            $rs = Lesson::create($postData);
            #5.判断
            echo $rs ? 'success' : 'error';
        } else {
            #2.获取所有课程数据
            $courses = Course::get();
            #3.加载视图
            return view('admin.lesson.add', compact('courses'));
        }
    }
}
