<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            #charset会自动获取config/database.php中的【charset】信息
            $table->engine = 'myisam';
            $table->increments('id')->comment('管理员ID');
            $table->string('username', 20)->comment('用户名');
            $table->string('password', 255)->comment('密码');
            $table->unsignedTinyInteger('sex')->default(1)->comment('性别:1-男,2-女,3-未知');
            $table->char('mobile', 11)->default('')->comment('手机号');
            $table->string('email', 40)->default('')->comment('邮箱');
            $table->unsignedTinyInteger('role_id')->comment('角色ID');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('更新于');
            $table->unsignedTinyInteger('state')->default(1)->comment('用户状态:0-禁用,1-启动');
            $table->string('remember_token', 255)->default('')->comment('记住密码TOKEN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
