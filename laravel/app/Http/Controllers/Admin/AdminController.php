<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 【RBAC】管理员
 * @author phpopenfather <[email address]>
 */
class AdminController extends Controller
{
    #首页
    public function index()
    {
        #1.获取所有管理员数据
        $admins = Admin::with('role')->orderBy('id', 'desc')->paginate(2);
        #2.加载视图
        return view('admin.admin.index', compact('admins'));
    }
}
