<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Day4Controller extends Controller
{
    //测试上传
    public function t6(Request $request)
    {


//        Cache::put('username', 'adsfsdfsfd', 1);
        echo Cache::get('username');die;





//        $request->hasFile(上传框name属性值)   相当于  isset($_FILES['image'])
//        $request->file(上传框name属性值)->isValid()    上传分两步 1-放到临时目录，2-移动到指定目录
//        $filename = $request->file(上传框name属性值)->store(子路径，存储驱动器名称);  move_upload_files
//        ----------------------------------------------
//            存储驱动器的名称：对应config/filesystems.php文件的声明
//        子路径：指会在config/filesystems.php文件声明的上传文件夹下再创建一个文件

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $filename = $request->file('image')->store('img', 'uploads');

            echo $filename;die;

        } else {
            return view('t6');
        }
    }
}
