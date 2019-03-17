<?php

use Illuminate\Database\Seeder;

class KaoshiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #试卷
        $data = [
            ['paper_name'=>'JavaScript考试', 'course_id'=>1, 'score'=>100],
            ['paper_name'=>'PHP考试', 'course_id'=>2, 'score'=>100],
            ['paper_name'=>'HTML考试', 'course_id'=>3, 'score'=>100],
            ['paper_name'=>'CSS考试', 'course_id'=>3,  'score'=>100],
            ['paper_name'=>'JQ考试', 'course_id'=>3,  'score'=>100]
        ];
        DB::table('paper')->insert($data);
#试卷题目
        $data = [
            [
                'type'=> 1, 'paper_id'=>1, 'score'=>10, 'question'=>'JS介绍正确的是',
                'options' => '说法1,说法2,说法3,说法4', 'answer'=> 'A', 'remark' => 'desc'
            ],
            [
                'type'=> 1, 'paper_id'=>1, 'score'=>40, 'question'=>'JS你不知道的秘密',
                'options' => '说法1,说法2,说法3,说法4', 'answer'=> 'B', 'remark' => 'desc'
            ],
            [
                'type'=> 2, 'paper_id'=>1, 'score'=>50, 'question'=>'JS介绍正确的是',
                'options' => '说法1,说法2,说法3,说法4', 'answer'=> 'CD', 'remark' => 'desc'
            ],
            [
                'type'=> 1, 'paper_id'=>2, 'score'=>10, 'question'=>'PHP介绍正确的是',
                'options' => '说法1,说法2,说法3,说法4', 'answer'=> 'A', 'remark' => 'desc'
            ],
            [
                'type'=> 1, 'paper_id'=>2, 'score'=>40, 'question'=>'PHP你不知道的秘密',
                'options' => '说法1,说法2,说法3,说法4', 'answer'=> 'B', 'remark' => 'desc'
            ],
            [
                'type'=> 2, 'paper_id'=>2, 'score'=>50, 'question'=>'PHP介绍正确的是',
                'options' => '说法1,说法2,说法3,说法4', 'answer'=> 'CD', 'remark' => 'desc'
            ],
        ];
        DB::table('question')->insert($data);
    }
}
