<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    /**
     * 声明表名（注：laravel会自动加s所以自己声明覆盖）
     * @var string
     */
    protected $table = 'paper';

    /**
     * Unix时间戳形式填充创建于和更新于（注：模型默认托管时间但是是datetime类型）
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * 声明可批量设置的属性（注：当使用create静态方式时）
     * @var array
     */
    protected $fillable = ['paper_name', 'course_id', 'score'];
    public function course(){
        return $this->hasOne('App\Http\Models\Course','id','course_id');
    }
}