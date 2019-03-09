<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table='profession';
    protected $dateFormat='U';
    protected $fillable=['profession_name','profession_desc'];
}
