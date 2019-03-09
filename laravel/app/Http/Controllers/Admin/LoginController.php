<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $postData=$request->only('username','password','captcha');
            $online=$request->input('online',0);
            $request->validate([
                'username'=>'required|min:1|max:8',
                'password'=>'required|min:1|max:32',
                'captcha'=>'required|captcha'
            ],[
                'captcha.captcha'=>'验证码错误'
            ]);
            $rs = Auth::guard('admin')->attempt([
                'username' => $postData['username'],
                'password' => $postData['password']
            ],$online);
//            dd(111);
            if($rs) return redirect(url('/admin/index/index'));
            return redirect(url('admin/login'))->withErrors(['tips'=>'登陆失败']);
        }
        return view('admin.login.login');
    }

    public function logout(){
        #步骤1：调用Auth方法退出
        Auth::guard('admin')->logout();
        #步骤2：退出后重定向
        return redirect(url('admin/login'))->withErrors(['tips'=>'退出成功']);
    }
}
