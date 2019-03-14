<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public  function index(){
        $admins=Admin::with('role')->paginate(10);
        return view('admin.admin.index',compact('admins'));
    }
}
