<?php

use Illuminate\Database\Seeder;

class PickTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建专业表
        DB::table('profession')->insert([
            ['profession_name'=>'PHP学科','profession_desc'=>'是世界上最好的语言'],
            ['profession_name'=>'HTML5&全栈','profession_desc'=>'PHP最棒'],
            ['profession_name'=>'Python全栈','profession_desc'=>'PHP我爱你']
        ]);
//创建课程表
        DB::table('course')->insert([
            ['profession_id'=>1,
                'teacher'=>'张老师',  'course_name'=>'PHP核心编程',
                'course_price'=>12.34,'course_desc'=>'非常经典的课程'],
            ['profession_id'=>2,
                'teacher'=>'张老师',   'course_name'=>'LInux环境安装',
                'course_price'=>452.34,'course_desc'=>'非常经典的课程'],
            ['profession_id'=>3,
                'teacher'=>'赵老师',    'course_name'=>'PHP文件上传',
                'course_price'=>6712.34,'course_desc'=>'非常经典的课程']
        ]);
//创建课时表
        DB::table('lesson')->insert([
            ['course_id'=>1, 'lesson_name'=>'PHP文件上传'],
            ['course_id'=>1, 'lesson_name'=>'PHP数组'],
            ['course_id'=>2, 'lesson_name'=>'ajax的前生今世'],
            ['course_id'=>3, 'lesson_name'=>'linux的环境安装'],
    ]);
    }
}
