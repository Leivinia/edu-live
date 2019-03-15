<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Role;
use App\Http\Models\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 【RBAC】角色模块
 * @author phpopenfather <[email address]>
 */
class RoleController extends Controller
{
    #给角色分配权限
    public function assignAuth(Request $request, $roleId)
    {
        #1.判断提交方式
        if ($request->isMethod('post')) {
            #2.接受数据
            $authIds = $request->input('authIds', []); //数组  切记切记  name属性值必须写中括号
            #3.过滤
            #4.入库（所有权限ID  入   auth_ids 和  auth_ac）
            $auths = Auth::whereIn('id', $authIds)->get();
            foreach($auths as $auth) {
                $auth_ac[] = $auth->controller.'@'.$auth->action;
            }
            $rs = Role::where('id', $roleId)->update([
                'auth_ids' => implode(',', $authIds), //字符串类型，多个之间用逗号隔开
                'auth_ac' => implode(',', $auth_ac), //控制器名@方法名,...,控制器名@方法名
            ]);
            #5.响应
            echo $rs ? 'success' : 'error';
        } else {
            #2.根据角色ID 获取当前角色所有权限
            $role = Role::where('id', $roleId)->first();   //$role小对象
            $defaultAuthsArr = explode(',', $role->auth_ids); //explode字符串变数组  implode数组变字符串
            #2.查询所有权限
            $topAuths = Auth::where('pid', 0)->get();
            $sonAuths = Auth::where('pid', '!=' ,0)->get();
            #3.加载视图
            return view('admin.role.assignAuth', compact('topAuths', 'sonAuths', 'defaultAuthsArr'));
        }
    }

    #首页
    public function index()
    {
        #1.获取所有角色数据
        $roles = Role::get();
        #2.加载视图
        return view('admin.role.index', compact('roles'));
    }
}
