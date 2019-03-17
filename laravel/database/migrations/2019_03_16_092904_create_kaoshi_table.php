<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaoshiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #试卷
        Schema::create('paper', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paper_name', 50)->comment('试卷名');
            $table->unsignedTinyInteger('course_id')->comment('关联课程ID，所属的课程');
            $table->unsignedTinyInteger('score')->default(100)->comment('试卷总分');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('更新于');
        });

#试题
        Schema::create('question', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('type')->default(1)->comment('类型:1-单选,2-多选');
            $table->unsignedTinyInteger('paper_id')->comment('关联试卷ID');
            $table->unsignedTinyInteger('score')->comment('该题总分');
            $table->string('question')->comment('试题具体内容');
            $table->string('options')->comment('选项内容');
            $table->string('answer')->comment('正确答案');
            $table->string('remark')->comment('试题备注说明');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('更新于');
        });
#答题表
        Schema::create('answer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('paper_id')->comment('关联试卷ID');
            $table->unsignedTinyInteger('question_id')->comment('关联课程ID，所属的课程');
            $table->unsignedTinyInteger('member_id')->comment('会员ID');
            $table->unsignedTinyInteger('is_correct')->comment('是否正确:1-是,2-否');
            $table->unsignedTinyInteger('score')->default(0)->comment('得分');
            $table->char('answer', 4)->comment('学生的答案');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('更新于');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kaoshi');
    }
}
