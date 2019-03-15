<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Stream;
use App\Http\Models\Live;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 【直播课程】直播课程模块
 * @package App\Http\Controllers\Admin
 */
class LiveController extends Controller
{
    #添加
    public function add(Request $request)
    {
        #1.判断提交方式
        if ($request->isMethod('post')) {
            #2.接受数据(ps. 字符串日期 的 转换为时间戳 strtotime )
            $postData = $request->only('stream_id', 'live_name', 'start_time', 'end_time');
            $postData['start_time'] = strtotime($postData['start_time']);
            $postData['end_time'] = strtotime($postData['end_time']);
            #2.接受数据（图片） $_FILES
            if ($request->hasFile('img') && $request->file('img')->isValid())
            {
                $filename = $request->file('img')->store('img', 'uploads');
                $postData['img'] = $filename;
            }
            #3.过滤数据
            #4.入库（ps. 入库成功后直播流要不要标记已经使用）
            $rs = Live::create($postData);
            #5.判断
            if ($rs) {
                Stream::where('id', $postData['stream_id'])->update([
                    'is_use' => Stream::IS_USE_YES
                ]);
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            #2.获取所有直播流数据
            $streams = Stream::where('state', Stream::STATE_NORMAL)
                ->where('is_use', Stream::IS_USE_NO)
                ->get();
            #3.加载视图
            return view('admin.live.add', compact('streams'));
        }
    }

    #列表
    public function index()
    {
        #1.获取所有直播课程数据
        $lives = Live::with('stream')->paginate(2);
        #2.加载视图
        return view('admin.live.index', compact('lives'));
    }
}
