<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Paper;
use App\Http\Models\Course;

class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::with('course')->paginate(2);
        return view('admin.paper.index', compact('papers'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $postData=$request->only(['paper_name','score','course_id']);
            $rs=Paper::create($postData);
            echo $rs?'success':'error';
        } else {
            $courses = Course::get();
            return view('admin.paper.add', compact('courses'));
        }
    }
}
