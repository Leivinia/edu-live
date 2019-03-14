<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Role;
use App\Http\Models\Auth;

class RoleController extends Controller
{
    public function index(){
        $roles=Role::paginate(10);
        return view('admin.role.index',compact('roles'));
    }
    public function assignAuth(Request $request,$roleid){
        if ($request->isMethod('post')) {
            $authidsArr=$request->input('auth');
            if ($authidsArr) {
                var_dump($authidsArr);
                die('wrong');

            }
//            echo $rs ? 'success' : 'error';
        }else{
            $topAuths=Auth::where('pid',0)->get();
            $sonAuths=Auth::where('pid','<>',0)->get();
            $auth=Role::where('id',$roleid)->first();
            $authids=explode(',',$auth->auth_ids);
            return view('admin.role.assignAuth',compact('topAuths','sonAuths','authids'));
        }

    }
}
