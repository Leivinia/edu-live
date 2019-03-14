<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRbacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #角色表
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_name', 20)->comment('角色名称');
            $table->string('auth_ids')->comment('权限表ID集合,如:1,2,3');
            $table->text('auth_ac')->comment('权限表对应控制器方法集合,如:admincontroller@index,indexcontroller@index');
            $table->unsignedInteger('created_at')->default(0)->comment('创建于');
            $table->unsignedInteger('updated_at')->default(0)->comment('创建于');
        });
#权限表
        Schema::create('auth', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_name', 20)->comment('权限名称');
            $table->string('controller', 40)->comment('控制器名');
            $table->string('action', 30)->comment('方法名');
            $table->unsignedTinyInteger('pid')->default(0)->comment('等级:0-顶级,其他-子级（最多2级）');
            $table->unsignedTinyInteger('is_nav')->default(1)->comment('是否菜单显示:1-是,0-否');
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
//        Schema::dropIfExists('rbac');
    }
}
