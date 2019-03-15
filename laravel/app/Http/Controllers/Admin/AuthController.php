<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 【RBAC】权限模块
 * @author phpopenfather <[email address]>
 */
class AuthController extends Controller
{
    #添加
    public function add(Request $request)
    {
        #1.判断提交方式
        if ($request->isMethod('post')) {
            #2.接受数据
            $postData = $request->only('auth_name', 'controller', 'action', 'pid', 'is_nav');
            #3.过滤
            $validator = \Validator::make($postData, [
                'auth_name' => 'required|min:2|max:8',
                'controller' => 'required|min:2',
                'action' => 'required|min:2',
                'pid' => 'required',
                'is_nav' => 'required'
            ]);
            if ($validator->fails()) {
                echo $validator->errors()->first('stream_name');
                return;
            }
            #4.入库
            if ($postData['pid'] == 0) $postData['action'] = '';
            $rs = Auth::create($postData);
            #5.判断响应
            echo $rs ? 'success' : 'error';
        } else {
            #2.获取所有顶级权限
            $topAuths = Auth::where('pid', 0)->get();
            #3.加载视图
            return view('admin.auth.add', compact('topAuths'));
        }
    }

    #首页
    public function index()
    {
        #1.获取所有管理员数据
        $auths = Auth::get();
        #2.加载视图
        return view('admin.auth.index', compact('auths'));
    }
}
