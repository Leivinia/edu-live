<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建专业表
        Schema::create('profession', function (Blueprint $table) {
            $table->increments('id')->comment('专业ID');
            $table->string('profession_name',32)->comment('专业名称');
            $table->string('profession_desc')->default('')->comment('描述');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('创建于');
        });
//创建课程表
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id')->comment('课程ID');
            $table->integer('profession_id')->comment('专业ID');
            $table->string('img', 120)->default('')->comment('封面图');
            $table->string('course_name', 30)->comment('课程名称');
            $table->decimal('course_price', 10, 2)->default(0)->comment('课程价格');
            $table->string('teacher', 20)->default('')->comment('老师');
            $table->string('course_desc')->default('')->comment('课程描述');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('创建于');
        });
//创建课时表
        Schema::create('lesson', function (Blueprint $table) {
            $table->increments('id')->comment('课时ID');
            $table->integer('course_id')->comment('课程ID');
            $table->string('lesson_name',32)->comment('课时名称');
            $table->string('video_address',120)->default('')->comment('视频的地址');
            $table->integer('video_time')->default(0)->comment('课时的时长');
            $table->unsignedTinyInteger('state')->default(1)->comment('状态:0-禁用,1-开启');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('创建于');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pick');
    }
}
