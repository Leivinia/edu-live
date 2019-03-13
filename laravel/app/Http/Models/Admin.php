<?php

namespace App\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    /**
     * 实现接口（Authenticatable）中的所有抽象方法
     */
    use Authenticatable;

    /**
     * 声明表名
     * @var string
     */
    protected $table = 'admin';
}