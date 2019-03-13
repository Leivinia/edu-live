<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 【点播】专业分类模块
 * @author phpopenfather <[email address]>
 */
class ProfessionController extends Controller
{
    #首页
    public function index()
    {
        #1.获取所有专业分类数据
        $professions = Profession::paginate(2);
        #2.加载视图并传递数据
    	return view('admin.profession.index', compact('professions'));
    }
}
