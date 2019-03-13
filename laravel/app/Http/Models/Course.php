<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * 声明表名（注：laravel会自动加s所以自己声明覆盖）
     * @var string
     */
    protected $table = 'course';

    /**
     * Unix时间戳形式填充创建于和更新于（注：模型默认托管时间但是是datetime类型）
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * 声明可批量设置的属性（注：当使用create静态方式时）
     * @var array
     */
    protected $fillable = [
        'profession_id',
        'course_name',
        'course_price',
        'course_desc',
        'img',
        'teacher'
    ];

    /**
     * 课程（1）：专业分类（1）
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profession()
    {
        return $this->hasOne('\App\Http\Models\Profession', 'id', 'profession_id');
    }
}