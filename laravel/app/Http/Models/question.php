<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * 声明表名（注：laravel会自动加s所以自己声明覆盖）
     * @var string
     */
    protected $table = 'question';

    /**
     * Unix时间戳形式填充创建于和更新于（注：模型默认托管时间但是是datetime类型）
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * 声明可批量设置的属性（注：当使用create静态方式时）
     * @var array
     */
    protected $fillable = ['type', 'paper_id', 'score', 'question', 'options', 'answer', 'remark'];
    public function paper(){
        return $this->hasOne('\App\Http\Models\Paper','id','paper_id');
    }
}