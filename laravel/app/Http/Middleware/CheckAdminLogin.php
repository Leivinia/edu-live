<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        #防翻墙（判断用户是否登录）
        if (!Auth::guard('admin')->check()) {
            #重定向跳转，状态码302
            return redirect(url('admin/login'))->withErrors(['tips'=>'请登陆']);
        }
        return $next($request);
    }
}