<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZhiboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建直播流表
        Schema::create('stream', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stream_name')->comment('直播流名称');
            $table->unsignedTinyInteger('state')->default(1)->comment('直播流状态:1-正常,2-永久禁播,3-限时禁播');
            $table->unsignedTinyInteger('is_use')->default(0)->comment('是否使用:0-否,1-是');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('创建于');
        });
        //创建直播课程表
        Schema::create('live', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stream_id')->comment('所属直播流');
            $table->string('live_name', 200)->comment('直播课程名称');
            $table->string('img')->default('')->comment('封面');
            $table->unsignedInteger('start_time')->default(0)->comment('直播开始时间');
            $table->unsignedInteger('end_time')->default(0)->comment('直播结束时间');
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
        Schema::dropIfExists('zhibo');
    }
}
