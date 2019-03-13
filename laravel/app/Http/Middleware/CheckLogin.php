<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckLogin
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
        #判断用户是否登录
        if (!Auth::guard('admin')->check()) {
            return redirect(url('admin/login'))->withErrors(['tips'=>'请登录...']);
        }
        return $next($request);
    }
}
