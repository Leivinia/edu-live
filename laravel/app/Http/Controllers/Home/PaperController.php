<?php

namespace App\Http\Controllers\Home;

use App\Http\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaperController extends Controller
{
    //列表
    public function index($paperId)
    {
        #获取试卷所有题目
        $questions = Question::where('paper_id', $paperId)->get();
        #加载视图并传递数据
        return view('home.paper.index', compact('questions'));
    }
}