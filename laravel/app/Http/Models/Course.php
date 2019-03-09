<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='profession';
    protected $dateFormat='U';
    protected $fillable=['profession_name','profession_desc'];
}
