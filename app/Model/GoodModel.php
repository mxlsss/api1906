<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodModel extends Model
{
    protected $table='a_goods';
    protected $guarded =[];
    public $timestamps = false;
}
