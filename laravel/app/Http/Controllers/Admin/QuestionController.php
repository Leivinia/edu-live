<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index(){
        $questions=Question::with('paper')->paginate(2);
        return view('admin.question.index',compact('questions'));
    }
}
