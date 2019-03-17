<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Live;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页
    public function index()
    {
        #加载视图
        return view('home.index.index');
    }
}