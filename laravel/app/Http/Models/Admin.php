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

    /**
     * 管理员（1）：角色（1）
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('\App\Http\Models\Role', 'id', 'role_id');
    }
}