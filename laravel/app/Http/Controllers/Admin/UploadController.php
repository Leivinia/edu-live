<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 后台图片上传接口
 * @author 赵四
 */
class UploadController extends Controller
{
    //图片写入
    public function put(Request $request)
    {
        #1.判断是否上传文件  &&  判断是否上传服务器成功
        if ($request->hasFile('file') && $request->file('file')->isValid())
        {
            #2.移动
            $filename = $request->file('file')->store('', 'uploads');
            #3.返回接口
            return $filename ? $filename : 'error';
        }
        return 'error';
    }
}