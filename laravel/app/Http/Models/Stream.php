<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    //直播流状态:1-正常,2-永久禁播,3-限时禁播
    const STATE_NORMAL = 1;
    const STATE_LONG_STOP = 2;
    const STATE_SHORT_STOP = 3;
    //是否使用:0-否,1-是
    const IS_USE_NO = 0;
    const IS_USE_YES = 1;

    /**
     * 声明表名（注：laravel会自动加s所以自己声明覆盖）
     * @var string
     */
    protected $table = 'stream';

    /**
     * Unix时间戳形式填充创建于和更新于（注：模型默认托管时间但是是datetime类型）
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * 声明可批量设置的属性（注：当使用create静态方式时）
     * @var array
     */
    protected $fillable = ['stream_name', 'state', 'is_use'];
}