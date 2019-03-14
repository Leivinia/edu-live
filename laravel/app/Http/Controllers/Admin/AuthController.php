<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

/**
 * 后台权限管理
 * @author  phpopenfather
 * @package App\Http\Controllers\Admin
 */
class AuthController extends Controller
{
    //权限列表
    public function index()
    {
        #步骤1：获取全部数据
        $auths = Auth::paginate(10);
        #步骤2：加载视图并传递数据
        return view('admin.auth.index', compact('auths'));
    }
    public function add(Request $request)
    {
        if ($request->isMethod('post')){
            $postData=$request->only('pid','auth_name','controller','action','is_nav');
            $postData['action']=isset($postData['action'])?$postData['action']:'';

            $rs=Auth::create($postData);
            echo $rs?'success':'error';
          }else{
            #步骤2：查询数据
            $topAuths = Auth::where('pid', 0)->get();
            #步骤3：加载视图并传递数据
            return view('admin.auth.add', compact('topAuths'));
        }
    }
}