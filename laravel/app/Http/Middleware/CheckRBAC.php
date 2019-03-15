<?php

namespace App\Http\Middleware;

use Closure;

class CheckRBAC
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
//        1.获取当前角色 所有权限  CA  controller  action
          $allCAs = \Auth::guard('admin')->user()->role()->first()->auth_ac; //控制器名@方法名
          $allCAs .= ',IndexController@index,IndexController@welcome';
//        2.判断当前角色 访问的是哪一个控制器 方法
          $url = \Route::currentRouteAction(); //App\Http\Controllers\Admin\IndexController@index
          $nowCA = explode('\\', $url);
          $nowCA = end($nowCA);
//        3.判断 2 是否在 1在   strpos  找到了返回数字，找不到false   （-1  indexOf）
          if(strpos($allCAs, $nowCA) === false) {
              echo "<script>alert('无权操作');parent.location.href='".url('admin/index/index')."'</script>";
          }

        return $next($request);
    }
}
