<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 登录模块
 * @author phpopenfather <[email address]>
 */


class LoginController extends Controller
{
    //退出
    public function logout()
    {
        #1.销毁登录信息
        Auth::guard('admin')->logout();
        #2.跳转
        return redirect(url('admin/login'))->withErrors(['tips'=>'退出成功']);
    }

    //登录
    public function login(Request $request)
    {
    	#1.判断提交方式
    	if ($request->isMethod('post')) {
    		#2.接受数据
    		$postData = $request->only('username', 'password', 'captcha');
    		$online = $request->input('online', 0);
    		#3.过滤数据
            $request->validate([
                // 用户名：必须，3~8个字符
                'username' => 'required|min:3|max:8',
                // 密  码：必须，6~32个字符
                'password' => 'required|min:6|max:32',
                // 验证码：必须，2个字符
                // 'captcha' => 'required|size:2'
                // 'captcha' => 'required|captcha|regex:/^\d{2}$/'
                'captcha' => 'required|captcha'
            ], [
                'captcha.captcha' => '验证码错误'
            ]); 
    		#4.数据库操作（1-判断用户是否存在，2-判断密码是否正确，3-记住密码，4-保存用户信息）
    		// Auth::guard(参数)->attempt（用户名和密码数组，是否保存用户状态:true-是,false-否）
    		$rs = Auth::guard('admin')->attempt([
    			'username' => $postData['username'],
    			'password' => $postData['password']
    		], $online);
    		#5.跳转
    		if ($rs) {
    			return redirect(url('admin/index/index'));
    		} else {
    			return redirect(url('admin/login'))->withErrors(['tips'=>'账号或密码错误']);
    		}
    	} else {
	    	#2.加载视图
	    	return view('admin.login.login');
    	}
    }
}
